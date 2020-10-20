<?php
	global $user;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	update_ostad_timing($_POST["ostad_uid"], $user->uid, $_POST["time_select"]);
}

?>

<?php
	$query = db_select('uc_orders', 'o');
	$query->join('uc_order_products', 'p', 'o.order_id = p.order_id');
	$results = $query->fields('o', array('order_id'))
					->fields('p', array('qty', 'data'))
					->condition('o.uid', $user->uid)
					->condition('p.nid', '2597')
					->condition('o.order_status', 'completed')
					->execute()
					->fetchAll();
	$ostad_uid = $bought = 0;
	if(count($results) > 0){
		$product_attributes = array();
		foreach($results as $row){
			$bought += $row->qty;
			$data = unserialize($row->data);
			$ostad_uid = translate_teachers_att_id(key($data['attributes']['ostad'])); //gets the first selected ostad
			$instrument = reset($data['attributes']);//gives us instrument
			for($i = 0 ; $i < $row->qty ; $i++)
				array_push($product_attributes, array(reset($instrument), $ostad_uid, $row->order_id));
		}
		$ostad = user_load($ostad_uid);
		print '<div class="course-info">
				<p class="saaz">دوره : <span>'. $product_attributes[0][0] .'</span></p>
				<span class="seperator"></span>
				<p class="ostad">استاد : <span>'. $ostad->field_naame['und'][0]['value'] .'</span></p>
				<span class="seperator"></span>
				<p class="modat" style="font-family: fanum; text-align:center;margin-top: -10px;">مدت زمان : <span>4 هفته</span></p>
			</div>';
		//print '<div class="bought"><span>تعداد بلیط خریداری شده</span><span>'. $bought .'</span></div>';
		drupal_add_js(array('product_attributes' => $product_attributes, 'bought_product' => $bought), 'setting');
	}
	//drupal_add_js(drupal_get_path('theme', 'sara') . '/js/pages/form.js');
?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($display_submitted): ?>
    <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
    <?php endif; ?>
  </header>
  <?php endif; ?>
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);

	print '<div class="description rules"><div><p>ثبت نام در دوره های آموزشی حضوری بصورت ماهیانه بوده و 4 هفته اعتبار دارد و مدت زمان هر جلسه نیم ساعت می باشد.</p><p>پس از انتخاب روز و ساعت کلاس، شما باید هر هفته در همان زمان انتخاب شده در آموزشگاه حضور یابید.</p><p>غیبت از کلاس باعث سوخت شدن جلسه شما می شود. البته در مواقعی که نتوانید در کلاس حضور یابید (بعلت بیماری و یا مسافرت و ...) می توانید جلسه را بصورت مجازی شرکت کنید. بدین منظور حتما یک روز قبل از کلاس باید هماهنگی های لازم را با آموزشگاه به عمل آورید.</p></div></div>';

	//$result = db_query('call classes_timing()')->fetchAll(); //stored procedure didnt worked with parameters
	//todo : check if we can use parameters in where clause in sql stored procedure
	if($ostad_uid != 0){
	$query = "SELECT
					f.delta as delta,
					days.field_days_value as days,
					times.field_time_value as times,
					en.field_enable_value as enabled,
					stu.field_user_uid as stu,
					online.field_is_online_value as online,
					vip.field_vip_value as grp

					FROM `field_data_field_classes_timing` f

					LEFT JOIN field_data_field_enable en ON en.entity_id = f.field_classes_timing_value and en.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_time times  ON times.entity_id = f.field_classes_timing_value and times.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_days days ON days.entity_id = f.field_classes_timing_value and days.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_vip vip ON vip.entity_id = f.field_classes_timing_value and vip.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_user stu ON stu.entity_id = f.field_classes_timing_value and stu.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_is_online online ON online.entity_id = f.field_classes_timing_value and online.bundle = 'field_classes_timing'

					WHERE f.entity_type = 'user' and f.entity_id = :uid
					ORDER BY delta";
	$result = db_query($query, array(':uid' => $ostad_uid))->fetchAll();

	$i = 0;
	$print_form = true;
	foreach($result as $row){
		$i++;
		if($row->stu == $user->uid){
			print '<div class="alert alert-success" role="alert" style="font-family: fanum;">اطلاعات شما با موفقیت ارسال شد.<br>
			برنامه کلاسی شما:
			<span class="selected">روزهای '. translate_days($row->days) .' ساعت '. translate_hours($row->times) .' تا '. translate_hours($result[$i]->times) .'</span>
			</div>';
			$print_form = false;
		}
	}

	if($print_form || $user->uid == 1){
		$timing = array();
		foreach($result as $row){
			$timing[$row->days][] = $row;
		}
		$output = '
		<form id="time-selection" method="post" action="/enrollment/time-selection" accept-charset="UTF-8">
		<table class="classes-timing">
			<tbody>
		';
		foreach($timing as $day_key => $day){
			$output .= '<tr>';
			$output .= '<td class="day-name">'. translate_days($day_key) .'</td>';
			$odd = true;
			foreach($day as $time){
				$output .= ($odd)? '<td>' : '';
        $output .= '<label class="'. (is_null($time->stu)? 'empty ' : 'busy ') . (($time->enabled == 1)? 'enabled ' : 'disabled ') . (!empty($time->grp)? 'group ' : '') . (!empty($time->online)? 'online ' : '') .'">';
				$output .= '<input type="radio" name="time_select" value="select_'. $day_key .'_'. $time->times .'" '. (!is_null($time->stu) || ($time->enabled == 0)? 'disabled' : '') .' required>'. translate_hours($time->times);
				$output .= '</label>';
				$output .= ($odd)? '':'</td>' ;

				$odd = ($odd)? false : true;
			}
			$output .= '</tr>';
		}
		$output .= '
			</tbody>
		</table>
    <p style="margin: 10px 15px;padding: 5px 15px;border-right: 2px solid #F44336;">
      مواردی که آیکن <i class="mdi mdi-account-multiple"></i> را دارند، کلاسهای گروهی هستند. <br>
      و مواردی که آیکن <i class="mdi mdi-video-switch"></i> را دارند، کلاسهای آنلاین هستند.
    </p>
    ';

		if($bought > 0){
			$output .= '<input id="ostad-id" type="hidden" name="ostad_uid" value="'. $ostad_uid .'">
				<button type="submit" name="submit" value="Submit" class="btn btn-success">تایید و ارسال</button>';
		}
		$output .= '</form>';

		if($ostad_uid == 7262){
			$output = '<p class="hozouri">این کلاس به صورت گروهی برگزار می شود. برای شرکت در این کلاس با دفتر آموزشگاه با شماره های 44044497 - 44043963 تماس بگیرید.</p>' ;
		}

		print $output;
	}
	}
  ?>
  <style>
  #time-selection {
    width: 100%;
    overflow: auto;
}
.classes-timing {
    width: 100%;
    min-width: 1000px;
}
.classes-timing td {
    border: 1px solid #eee;
}
.classes-timing td .busy,
.classes-timing td .disabled {
    opacity: 0.4;
	background: #eee;
    cursor: default;
}
.classes-timing td label {
    padding: 10px;
    display: block;
    margin: 0;
    font-family: fanum;
    font-weight: normal;
	cursor: pointer;
	transition: all 0.3s ease;
}
.classes-timing td label input {
    margin: 0;
}
td.day-name {
    padding: 0 15px;
    text-align: center;
}
#time-selection button {
    min-width: 150px;
    margin: 15px 0 0 0;
    position: absolute;
    left: 15px;
}
.breadcrumb {
    display: none;
}
  .classes-timing td .online ,
  .classes-timing td .group {
    background: transparent;
    border: solid #2196F3;
    border-width: 0 1px;
    position: relative;
  }
  .classes-timing td .disabled.online ,
  .classes-timing td .disabled.group {
    opacity: 0.4;
    background: #ccc;
    cursor: default;
  }
  .classes-timing td .online:before,
  .classes-timing td .group:before {
    content: "\f00e";
    font-family: mat;
    font-size: 18px;
    vertical-align: middle;
    color: #2196F3;
    position: absolute;
    left: 5px;
  }
  .classes-timing td .online:before {
    content: "\f569";
  }
#node-2556 {
    padding-top: 0;
}
#time-selection input[type="radio"][disabled] {
    opacity: 0.3;
}
#time-selection tr + tr {
    border-top: 1px solid rgba(103, 58, 183, 0.5) !important;
}
#time-selection tr {
    border-bottom: none;
}
#time-selection td {
    border-width: 0 0px 0 0px !important;
}
.classes-timing td label.selected {
	box-shadow: 0px 0px 10px #673AB7;
    z-index: 1;
    border-radius: 5px;
    background: #fff;
    border-bottom-width: 0px;
}
#time-selection td:first-child {
    border: 1px solid #fff !important;
    border-left: 1px solid rgba(103, 58, 183, 0.5) !important;
    font-weight: 500;
}
.course-info {
    background: #fcfcfc;
    padding: 15px;
    border: solid #FFC107;
    border-width: 0 3px;
    margin: 10px;
	display: flex;
    justify-content: space-around;
    box-shadow: 0 1px 6px rgba(0,0,0,0.12), 0 1px 4px rgba(0,0,0,0.12);
}
.course-info p {
    margin: 0;
}
.course-info .seperator {
    background: #FFC107;
    width: 1px;
    height: 32px;
    margin: -5px 0 -5px 0;
}
#node-2556 .description.rules {
    margin: 0 0 10px 0;
    box-shadow: none;
    border: none;
    padding: 15px 0 0;
    background: #fff;
}
  .mdi:before {
    font-size: 18px;
    vertical-align: middle;
    color: #2196F3;
    padding: 6px;
    border: 1px solid;
    margin: 0 5px;
  }
@media (max-width: 500px) {
	.page-node .main-container {
		padding: 0;
	}
	.course-info {
		margin: 5px;
		padding: 15px 5px;
	}
}
.modal-content .hozouri ~ p {
    display: none;
}

.modal-content .hozouri {
    margin: -40px 15px 15px;
    z-index: 5;
    position: relative;
}
  </style>
  <script>
	$('#time-selection tr').each(function(){
		var hidden = true
		$(this).find('label').each(function(){
			if(!$(this).hasClass("disabled") && !$(this).hasClass("busy")){
				hidden = false
			}
		})
		if(hidden){
			$(this).addClass('hidden')
		}
	})
	$('#time-selection input').change(function(){
		if($(this).is( ":checked" )){
			$('#time-selection .selected').removeClass('selected');
			$(this).parent().addClass('selected');
		}
		$(this).parents('#time-selection').addClass('selected')
	})
	$('#time-selection button').click(function(e){
		if(!$('#time-selection').hasClass('selected')){
			e.preventDefault()
			$('#node-2556').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>باید حداقل یکی از گزینه ها را انتخاب کنید.</div>');
			$('html, body').animate({scrollTop: 200}, 200);
		}
	})
	if($('.alert-success').length) $('.modat').append('<span style="display: block; margin-bottom: -10px;">' + $('.alert-success span').html() + '</span>')
  </script>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
  <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
  </footer>
  <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>


<?php

function update_ostad_timing($ostad_uid, $student_uid, $timing) {
	$selected = explode('_', $timing);
	//finding exact delta
	$q = "SELECT
			f.delta as delta
			FROM field_data_field_classes_timing f

			LEFT JOIN field_data_field_time times  ON times.entity_id = f.field_classes_timing_value and times.bundle = 'field_classes_timing'
			LEFT JOIN field_data_field_days days ON days.entity_id = f.field_classes_timing_value and days.bundle = 'field_classes_timing'

			WHERE f.entity_type = 'user' AND days.field_days_value = :day AND times.field_time_value = :timing";

	$delta = db_query($q, array(':day' => $selected[1], ':timing' => $selected[2]))->fetchObject();

	$raw_user = user_load($ostad_uid);
	// Wrap it with Entity API
	$user = entity_metadata_wrapper('user', $raw_user);
	// Get the first item from the muli-value field collection
	$raw_collection = $user->field_classes_timing[$delta->delta]->value();
	// Wrap it with Entity API
	$collection = entity_metadata_wrapper('field_collection_item', $raw_collection);
	//dsm the old value
	dpm($collection->field_user->value());
	// Set a new value on the field_example textfield.
    $collection->field_user = array($student_uid);
	// Save the changes to the entity
	$collection->save();
}
?>

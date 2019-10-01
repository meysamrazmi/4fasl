<?php
function user_enrollment($uid){
	$user = user_load($uid);

	$query = db_select('uc_orders', 'o');
	$query->join('uc_order_products', 'p', 'o.order_id = p.order_id');
	$user_orders = $query->fields('o', array('order_id'))
					->fields('p', array('qty', 'data'))
					->fields('o', array('created'))
					->condition('o.uid', $user->uid)
					->condition('p.nid', '2597')
					->condition('o.order_status', 'completed')
					->execute()
					->fetchAll();

	//check to see if student has been assigned to any teacher
	$q = "SELECT 
			f.delta as delta,
			days.field_days_value as days, 
			times.field_time_value as times, 
			en.field_enable_value as enabled, 
			stu.field_user_uid as stu,
			f.entity_id as ostad_uid
			
			FROM `field_data_field_classes_timing` f
			
			LEFT JOIN field_data_field_enable en ON en.entity_id = f.field_classes_timing_value and en.bundle = 'field_classes_timing'
			LEFT JOIN field_data_field_time times  ON times.entity_id = f.field_classes_timing_value and times.bundle = 'field_classes_timing'
			LEFT JOIN field_data_field_days days ON days.entity_id = f.field_classes_timing_value and days.bundle = 'field_classes_timing'
			LEFT JOIN field_data_field_user stu ON stu.entity_id = f.field_classes_timing_value and stu.bundle = 'field_classes_timing'
			
			WHERE f.entity_type = 'user' 
			AND stu.field_user_uid = :uid
			ORDER BY delta";
	$assigned_teachers = db_query($q, array(':uid' => $user->uid))->fetchAll();

	if( isset($user->roles[9]) && count($assigned_teachers)){ //offline student

		$expires = timetoexpire($user->uid);

		//offline registered students
		foreach($assigned_teachers as $row){
			$ostad = user_load($row->ostad_uid);
			$remain = ceil( $expires['offline'] / 7);
      print '<div class="course-info">';
      print   '<p class="saaz">دوره : <span>'. t($ostad->field_favorite['und'][0]['value']) .'</span></p>';
      print   '<span class="seperator"></span>';
      print   '<p class="ostad">استاد : <span>'. $ostad->field_naame['und'][0]['value'] .'</span></p>';
      print   '<span class="seperator"></span>';

			print ($remain >= 0)?
        '<p class="modat" style="font-family: fanum; text-align:center;margin-top: -10px;">هفته های باقی مانده : <span>'. $remain .' هفته</span>'
        : '<p class="modat" style="font-family: fanum; text-align:center;margin-top: -10px;">اتمام دوره کاربری';

			print '<span class="selected">روزهای '. translate_days($row->days) .' ساعت '. translate_hours($row->times) .'</span>';

			if($remain < 2) print '<a href="/get-started/حضوری" target="_blank">تمدید کنید</a>';

			print '</p></div>';
		}
	}
	//the student has registered to a class but is not assigned to any teacher
	elseif(count($user_orders) > 0){
		foreach($user_orders as $row){
      //remaining weeks
      //we calculate remaining weeks based on user order and not with role expiration
      //because we let users to register to multiple classes
      $now = time();
			$remain = 4 - floor(($now - $row->created) / (60*60*24*7));

			$data = unserialize($row->data);
			$ostad_uid = instrument_info('Teacher_OptionId',key($data['attributes']['ostad']),array('ostad_uid')); //gets the first selected ostad
			$instrument = reset($data['attributes']);//gives us instrument

      $product_attributes = array();
			for($i = 0 ; $i < $row->qty ; $i++)
				array_push($product_attributes, array(reset($instrument), $ostad_uid, $row->order_id));

      $ostad = user_load($ostad_uid);
      print '<div class="course-info">';
      print   '<p class="saaz">دوره : <span>'. t($product_attributes[0][0]) .'</span></p>';
			print   '<span class="seperator"></span>';
      print   '<p class="ostad">استاد : <span>'. $ostad->field_naame['und'][0]['value'] .'</span></p>';
      print   '<span class="seperator"></span>';

      print ($remain >= 0)?
        '<p class="modat" style="font-family: fanum; text-align:center;margin-top: -10px;">هفته های باقی مانده : <span>'. $remain .' هفته</span>'
        : '<p class="modat" style="font-family: fanum; text-align:center;margin-top: -10px;">اتمام دوره کاربری';

      $assigned = false;
      foreach($assigned_teachers as $row){
        if($row->stu == $user->uid && $row->ostad_uid == $ostad_uid){
          print '<span class="selected">روزهای '. translate_days($row->days) .' ساعت '. translate_hours($row->times) .'</span>';
          $assigned = true;
        }
      }
      if(!$assigned && $remain >= 0)
        print '<a href="/enrollment/time-selection" target="_blank">انتخاب برنامه زمانی</a>';

      if($remain < 2)
        print '<a href="/get-started/حضوری" target="_blank">تمدید کنید</a>';

      print '</p></div>';
		}
	}
	else{
		print '
			<style>
				.field-name-user-enrollment {
					display: none;
				}
			</style>';
	}

  print user_enrollment_HTML();
}

function user_enrollment_HTML() {
  ob_start();
?>
<style>
.course-info {
    background: #fcfcfc;
    padding: 15px;
    border: solid #FFC107;
    border-width: 0 3px;
	display: flex;
    justify-content: space-around;
    box-shadow: 0 1px 6px rgba(0,0,0,0.12), 0 1px 4px rgba(0,0,0,0.12);
	margin-bottom: 20px;
}
.course-info + .course-info {
    margin-top: -19px;
}
.course-info p {
    margin: 0;
}
.course-info a{
    display: block;
    background: #2196F3;
    color: #fff;
    box-shadow: 0 1px 6px rgba(0,0,0,0.12);
    margin: 3px 0 -8px 0;
    border-radius: 2px;
}
.course-info .seperator {
    background: #FFC107;
    width: 1px;
    height: 32px;
    margin: -5px 0 -5px 0;
}
.field-name-user-enrollment {
    background: transparent !important;
    box-shadow: none !important;
    padding: 0 !important;
}
.field-name-user-enrollment .field-items {
    display: block;
    width: 100%;
    float: none;
	clear: both;
}
.field-name-user-enrollment .field-label {
    font-weight: 500;
    font-size: 18px;
    line-height: 60px;
}
.course-info .selected {
    display: block;
    margin-bottom: -10px;
}
</style>
<?php
  return ob_get_clean();
}
?>
<?php
function offline_students($uid){
  $query = "SELECT
					f.delta as delta,
					days.field_days_value as days,
					times.field_time_value as times,
					en.field_enable_value as enabled,
					stu.field_user_uid as stu

					FROM `field_data_field_classes_timing` f

					LEFT JOIN field_data_field_enable en ON en.entity_id = f.field_classes_timing_value and en.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_time times  ON times.entity_id = f.field_classes_timing_value and times.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_days days ON days.entity_id = f.field_classes_timing_value and days.bundle = 'field_classes_timing'
					LEFT JOIN field_data_field_user stu ON stu.entity_id = f.field_classes_timing_value and stu.bundle = 'field_classes_timing'

					WHERE f.entity_type = 'user' and f.entity_id = :uid and stu.field_user_uid IS NOT NULL
					ORDER BY days,times";
  $result = db_query($query, array(':uid' => $uid))->fetchAll();

	if(count($result) > 0){
    print '<div class="field-label">هنرجویان حضوری</div>';

    $now = time();
    $product_attributes = array();
    $day = -1;
    foreach($result as $row){
      if($day != $row->days) print '<div class="days">'. translate_days($row->days) .'</div>';
      $day = $row->days;

      $stu = user_load($row->stu);
      print '
			<div class="student-item">
				<div style="min-height: 80px;">
					<a href="/user/'. $stu->uid .'" style="float: right;" target="_blank">';

      if(isset($stu->picture))
        print theme('image_style', array('style_name' => '100x100', 'path' => $stu->picture->uri, 'attributes' => array('style' =>"border-radius: 50%;width: 80px;height: 80px; margin-left:20px;")));
      else
        print '<img src="http://4faslmusic.ir/sites/all/themes/bootstrap/images/user-100.png" width="100px" height=100px" style="border-radius: 50%;width: 80px;height: 80px; margin-left:20px;">' ;
      print '</a>
					<p>'. $stu->field_naame['und'][0]['value'] .'</p><p class="selected">روزهای '. translate_days($row->days) .' ساعت '. translate_hours($row->times) .'</p>';


      $form_id = 'student_node_refrence_form_' . $stu->uid;
      $student_confirm = drupal_get_form($form_id, intval($stu->uid));
      print drupal_render($student_confirm);
      print '</div>';

      $q = db_select('node','n');
      $q->join('field_data_field_enable', 'e', 'n.nid = e.entity_id');
      $count = $q->fields('n', array())
        ->condition('e.field_enable_value', 0)
        ->condition('n.uid', intval($stu->uid))
        ->condition('n.status', 1)
        ->condition('n.type', 'homework')
        ->condition('n.changed', time() - 60*60*24*8, '>')
        ->execute()->rowCount();

      print '<p class="expand"><span class="btn-sm more">ارسال فیلم</span>';
      if($count > 0) print '<a class="btn-sm more" href="/user/'. $stu->uid .'" target="_blank">تمرین های آخرین هفته</a>';
      print '</p></div>';


      /* 	$bought += $row->qty;
        $time = $now - $row->created;
        $time = $time / (60*60*24*7); //weeks passed
        $remain = 4 - floor($time); //remaining weeks
        $data = unserialize($row->data);
        $ostad_uid = instrument_info('Teacher_OptionId',key($data['attributes']['ostad']),array('ostad_uid')); //gets the first selected ostad
        $instrument = reset($data['attributes']);//gives us instrument
        for($i = 0 ; $i < $row->qty ; $i++)
          array_push($product_attributes, array(reset($instrument), $ostad_uid, $row->order_id)); */
    }
  }

  print BlockHTML();
}

function BlockHTML() {
  ob_start();
?>
  <style>
    .field-name-offline-students {
      clear: both;
      background: transparent !important;
      padding: 50px 0 0 !important;
      margin-bottom: 50px !important;
      box-shadow: none !important;
    }
    .field-name-offline-students .field-label {
      clear: both;
      border-bottom: 1px solid #ddd;
      padding: 10px;
      font-size: 18px;
      margin: 10px;
    }
    .student-item {
      display: inline-block;
      width: calc(33% - 15px);
      min-width: 300px;
      margin: 0 0 15px 15px;
      vertical-align: top;
      background: #fff;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.12), 0 1px 4px rgba(0,0,0,0.12);
    }
    .student-item form {
      clear: both;
      margin-top: 35px;
      display: none;
      position: relative;
    }
    .student-item form .form-group {
      margin-bottom: 0;
    }
    .student-item form button {
      padding: 6px 10px 7px;
      font-size: 12px;
      line-height: 1.5;
      border-radius: 3px;
      position: absolute;
      top: 27px;
      left: 0;
    }
    .student-item .btn-sm.more:hover {
      background: #eee;
    }
    .student-item .more {
      display: inline-block;
      transition: all 0.2s;
      cursor: pointer;
      color: #2196F3;
    }
    p.expand {
      clear: both;
      border-top: 1px solid #eee;
      text-align: left;
      margin: 10px -10px 0;
      width: calc(100% + 20px);
      padding: 10px 10px 0;
    }
    .days {
      padding: 5px 5px 15px;
      font-size: 15px;
      position: relative;
    }
    .days:before {
      content: "";
      position: absolute;
      width: 80px;
      background: #F44336;
      height: 2px;
      bottom: 10px;
      right: 0;
    }
  </style>

  <script>
    $('.student-item .more').click(function(){
      $(this).parents('.student-item').find('form').slideToggle()
    })
  </script>
<?php
  return ob_get_clean();
}
?>

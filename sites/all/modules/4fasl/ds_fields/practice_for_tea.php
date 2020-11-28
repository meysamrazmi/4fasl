<?php
function practice_for_teacher($uid){
    $students = db_select('user_relationships', 'ur')
    ->fields('ur', array('requester_id', 'rtid'))
    ->condition('requestee_id', $uid, '=')
    ->condition('rtid', array(1, 3), 'IN') //honarjoo and vip relationship type id
    ->execute()->fetchAll();

  $user_flag = array(true, true);
  global $user;

  foreach ($students as $row) {
    if ($row->rtid == 3) {
      continue;
    }
    $stu = user_load(intval($row->requester_id));
    if (array_key_exists(4, $stu->roles)) { //4 = student's role id ,6 = vip's role id
      if ($user_flag[0]) {
        print '<h4 class="student-managing-title">هنرجویان معمولی</h4>';
        $user_flag[0] = false;
      }

      $q = db_select('node', 'n');
      $q->join('field_data_field_vip', 'v', 'n.nid = v.entity_id');
      $count = $q->fields('n', array())
        ->condition('v.field_vip_value', 0)
        ->condition('n.uid', intval($stu->uid))
        ->condition('n.status', 1)
        ->condition('v.entity_type', 'node')
        ->condition('n.type', 'homework')
        ->execute()->rowCount();

      if ($count) {
        print views_embed_view('courses_list', 'students_practices', intval($stu->uid), 0);
        //			if($count < count(student_films($stu->uid))){
        //				print '<form id="student-confirmation-form-1" style="border-color: rgb(244, 67, 54);"><span>هنرجو تایید شده است و تمرین جدیدی ارسال نکرده است.</span></form>';
        //			}else{
        //$student_confirm = drupal_get_form('student_confirmation_form_'. $stu->uid , intval($stu->uid));
        $student_confirm = drupal_get_form('student_node_refrence_form_' . $stu->uid, intval($stu->uid));
        print drupal_render($student_confirm);
        //			}
      } else {
        if (array_key_exists(3, $user->roles))
          print no_practice($stu->uid);
      }
    }
  }

  if (array_key_exists(3, $user->roles)) {
    print '<h4 class="student-managing-title">هنرجویان غیر فعال</h4>';
    foreach ($students as $row) {
      if ($row->rtid == 3)
        continue;
      $stu = user_load(intval($row->requester_id));
      if (!array_key_exists(4, $stu->roles)) { //4 = student's role id ,6 = vip's role id
        print views_embed_view('courses_list', 'students_practices', intval($stu->uid), 0);
      }
    }
  }

  foreach ($students as $row) {
    if ($row->rtid == 1) {
      continue;
    }
    $stu = user_load(intval($row->requester_id));
    if (array_key_exists(6, $stu->roles)) { //4 = student's role id ,6 = vip's role id
      if ($user_flag[1]) {
        print '<h4 class="student-managing-title">هنرجویان VIP</h4>';
        $user_flag[1] = false;
      }

      $q = db_select('node', 'n');
      $q->join('field_data_field_vip', 'v', 'n.nid = v.entity_id');
      $vip_count = $q->fields('n', array())
        ->condition('v.field_vip_value', 1)
        ->condition('n.uid', intval($stu->uid))
        ->condition('n.status', 1)
        ->condition('n.type', 'homework')
        ->execute()->rowCount();

      if ($vip_count) {
        print views_embed_view('courses_list', 'students_practices', intval($stu->uid), 1);
        // print '<form id="student-confirmation-form-1" style="border-color: rgb(244, 67, 54);"><span>هنرجو VIP است.</span></form>';
        $student_confirm = drupal_get_form('student_node_refrence_form_' . $stu->uid, intval($stu->uid));
        print drupal_render($student_confirm);
      } else {
        if (array_key_exists(3, $user->roles))
          print no_practice($stu->uid);
      }
    }
  }

  if (array_key_exists(3, $user->roles)) {
    print '<h4 class="student-managing-title">هنرجویان غیر فعال VIP</h4>';
    foreach ($students as $row) {
      if ($row->rtid == 1)
        continue;
      $stu = user_load(intval($row->requester_id));
      if (!array_key_exists(6, $stu->roles)) {
        print views_embed_view('courses_list', 'students_practices', intval($stu->uid), 1);
      }
    }
  }
}

function no_practice($uid){
  $user1 = user_load($uid);
  $output = '<div class="students-section view-courses-list no-homework">
						<div class="attachment attachment-before">
							<div class="view view-courses-list view-id-courses_list view-display-id-attachment_1 student-pic">
								<div class="view-content">
									<div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
										<div class="views-field views-field-picture">
											<div class="field-content">
												<a href="/user/'. $user1->uid .'" title="هنوز تمرینی آپلود نکرده است">';
  if (isset($user1->picture)) {
    $output .= theme('image_style', array('style_name' => '100x100', 'path' => $user1->picture->uri)) ;
  }else{
    $output .= '<img src="/sites/all/themes/bootstrap/images/user-100.png" width="100px" height=100px">';
  }
  $output .= '</a>
											</div>
										</div>
									<div class="views-field views-field-field-naame" title="هنوز تمرینی آپلود نکرده است">';
  if (isset($user1->field_naame['und'][0])) {
    $output .= '<div class="field-content">' . $user1->field_naame['und'][0]['value'] . '</div>';
  }
  $output .= '</div>
									</div>
								</div>
							</div>
						</div>
					</div>';

  return $output;
}

?>

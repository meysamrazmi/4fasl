<?php
function print_result($nid){
  global $user;
  if($user->uid){
    $userr = user_load($user->uid);
    $node = node_load($nid);

    if(isset($node->field_siteinfo_stu['und'][0])){
      $i = 0;
      foreach ($node->field_siteinfo_stu['und'] as $key => $valu) {
        $temprow = entity_load('field_collection_item', $valu);
        $row = $temprow[$valu['value']];

        $rows[$i]['saaz'] = $row->field_instrument['und'][0]['value'];
        $rows[$i]['level'] = $row->field_levelnumber['und'][0]['value'];
        $rows[$i]['episode'] = $row->field_sessionnumber['und'][0]['value'];
        $i++;
      }
    }else 	if(isset($node->field_features['und'][0])){
      /*		$i = 0;
          foreach ($node->field_features['und'] as $key => $valu) {
            $temprow = entity_load('field_collection_item', $valu);
            $row = $temprow[$valu['value']];

            $rows[$i]['ostad'] = $row->field_ostad['und'][0]['value'];
            $rows[$i]['instrument'] = $row->field_instrument['und'][0]['value'];
            $i++;
          }*/
    }else{
      drupal_set_message(t('There is a problem with this page. Error code: %b', array('%b' => 1)), 'error');
    }
    $userr_rows = array();
    if(isset($userr->field_siteinfo_stu['und'][0])){
      $i = 0;
      foreach ($userr->field_siteinfo_stu['und'] as $key => $value) {
        $temprow = entity_load('field_collection_item', $value);
        $row = $temprow[$value['value']];

        $userr_rows[$i]['saaz'] = isset($row->field_instrument['und'][0]) ? $row->field_instrument['und'][0]['value'] : '' ;
        $userr_rows[$i]['level'] = isset($row->field_levelnumber['und'][0]) ? $row->field_levelnumber['und'][0]['value'] : '' ;
        $userr_rows[$i]['episode'] = isset($row->field_sessionnumber['und'][0]) ? $row->field_sessionnumber['und'][0]['value'] : '';
        $i++;
      }
    }
    if(
      (in_array_r($node->nid, $userr->field_node_refrence)) ||
      (isset($node->field_siteinfo_stu['und'][0]) &&
        (
          (
            in_array_r($rows[0]['saaz'] , $userr_rows) &&
            in_array_r($rows[0]['episode'] , $userr_rows) &&
            in_array_r($rows[0]['level'] , $userr_rows)
          ) ||
          $rows[0]['episode'] == '1'
        )
      ) ||
      in_array('administrator', $userr->roles)
    ){
      if (isset($node->field_course_film['und'][0]['fid'])) {
        $video_attrs = array(
          'src' => file_create_url($node->field_course_film['und'][0]['uri']),
          'width' => '840px',
          'height' => '472px',
          'poster ' => isset($node->field_image2['und'][0])?file_create_url($node->field_image2['und'][0]['uri']):'' ,
        );
        $video_sett =  array(
          'download_link' => TRUE,
          'download_text' => 'دانلود',
        );

        print theme('mediaelement_video', array('attributes' => $video_attrs, 'settings' => $video_sett));
        print '<a href="/report?link=[node:url]&destination=[node:url]" target="_blank" class="report">گزارش مشکل</a>';
      }else {
        print '<div class="no-video"><span class="">برای این قسمت ویدئویی در دسترس نیست</span></div>';
      }
    }else{
      print'<div class="no-permission no-video">
            <p>شما به این فیلم دسترسی ندارید</p>
            <a href="/node/35" class="btn btn-primary">ثبت نام در دوره ها</a>
          </div>';
    }
  }
  else{
    print '<div class="no-permission no-video">' .
      '<p>شما به این فیلم دسترسی ندارید</p>' .
      '<a href="/user/login#destination=node/'. $nid .'" class="btn btn-default">وارد شوید</a>' .
    '<a href="/user/register#destination=node/'. $nid .'" class="btn btn-primary">عضویت رایگان</a>' .
    '</div>';
  }
}

?>
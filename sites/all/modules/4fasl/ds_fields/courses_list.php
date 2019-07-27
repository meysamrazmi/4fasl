<?php
function print_result3($uid){
  $user = user_load($uid);
  $nid = isset($user->field_favorite['und'][0]) ? instrument_info('name', $user->field_favorite['und'][0]['value'], array('intro_nid')) : 0;

  $films = student_films($user->uid , true);
  $nav = '<ul class="tab-nav">';
  $body = '<div class="tab-container"><div class="tab-content">';
  if(count($films)){
    foreach($films as $instrument_key => $instrument_val){
      foreach($instrument_val as $level_key => $level_val){
        $nav .= '<li>'. t($instrument_key) . ' - '. t($level_key) .' </li>';
        $context = count($level_val)? implode('+', $level_val) : '' ;
        $body .= '<div>'. views_embed_view('courses_list', 'block_1', $context) . '</div>';
      }
    }
  }

  if(isset($user->field_node_refrence['und'][0]['nid'])){
    $body .= '<div><div class="view view-courses-list view-id-courses_list view-display-id-block_1"><div class="view-content">';
    foreach($user->field_node_refrence['und'] as $key => $val){
      $body .= _output_node($val['nid']);
    }
    $nav .= '<li>فیلم های تخصصی</li>';
    $body .= '</div></div></div>';
  }

  if($nid != 0){
    $nav .= '<li>فیلم معرفی ساز مورد علاقه</li>';
    $body .= '<div><div class="view view-courses-list view-id-courses_list view-display-id-block_1"><div class="view-content">';
    $body .= _output_node($nid);
    $body .= '</div></div></div>';
  }

  $nav .= '<span class="active-bar"></span></ul>';
  $body .= '</div></div>';
  print '<div class="movies-tab">'. $nav . $body .'</div>';

  /* if($user->uid == 1){
    print '<div class="movies-tab">'. $nav . $body .'</div>';
  }else{
    $selected = student_films($user->uid);
    $context = count($selected)? implode('+', $selected) : '' ;
    print views_embed_view('courses_list', 'block_1', $context);
  }*/
}

function _output_node($nid){
  $node = node_load($nid);
  $output = '';
  if(isset($node->nid)){
    $output .= '
  <div class="views-row views-row-0 views-row-even views-row-first card-view col-lg-3 col-sm-4 col-xs-6 col-xs-4">
      <div about="/node/'. $nid .'#saaz-film" target="_blank" class="node node-course node-teaser clearfix">
      <div class="group-header">
        <div class="field field-name-field-image field-type-image field-label-hidden">
          <div class="field-items">
            <div class="field-item even">
              <a href="/node/'. $nid .'#saaz-film" target="_blank">';
    if(isset($node->field_film_image['und'][0])){
      $output .= '<img typeof="foaf:Image" class="img-responsive" src="'. image_style_url("250x175", $node->field_film_image['und'][0]['uri']) .'" width="250" height="175" alt="">';
    }else if(isset($node->field_image['und'][0])){
      $output .= '<img typeof="foaf:Image" class="img-responsive" src="'. image_style_url("250x175", $node->field_image['und'][0]['uri']) .'" width="250" height="175" alt="">';
    }
    $output .= '
              </a>
            </div>
          </div>
        </div>
        <div class="field field-name-title field-type-ds field-label-hidden">
          <div class="field-items">
            <div class="field-item even" property="dc:title">
              <h5>
                <a href="/node/'. $nid .'#saaz-film" target="_blank">' . $node->title . '</a>
              </h5>
            </div>
          </div>
        </div>
        <div class="field field-name-post-date field-type-ds field-label-hidden">
          <div class="field-items">
            <div class="field-item even"> </div>
          </div>
        </div>  
      </div>
    </div>
  </div>';
  }
  return $output;
}
?>
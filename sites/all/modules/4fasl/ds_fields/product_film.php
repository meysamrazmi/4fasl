<?php
if(!function_exists('product_film')) {
  function product_film($nid)
  {
    if (is_bought_product($nid)) {
      $node = node_load($nid);
      $uri = isset($node->field_course_film['und'][0])? file_create_url($node->field_course_film['und'][0]['uri']) : '';
      print '<a href="#" class="products-btn" data-uri="'. $uri .'">مشاهده</a>';
    }
  }

}

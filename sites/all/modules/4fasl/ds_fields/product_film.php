<?php
if(!function_exists('product_film')) {
  function product_film($nid)
  {
    global $user;

    $query = db_select('uc_orders', 'o');
    $query->join('uc_order_products', 'p', 'o.order_id = p.order_id');
    $results = $query->fields('o', array('order_id'))
      ->fields('p', array('qty', 'data'))
      ->condition('o.uid', $user->uid)
      ->condition('p.nid', $nid)
      ->condition('o.order_status', array('completed', 'pending'), 'IN')
      ->execute()->fetchAll();
    if (count($results) > 0) {
      $node = node_load($nid);
      $uri = isset($node->field_course_film['und'][0])? file_create_url($node->field_course_film['und'][0]['uri']) : '';
      print '<a href="#" class="products-btn" data-uri="'. $uri .'">مشاهده</a>';
    }

  }

}

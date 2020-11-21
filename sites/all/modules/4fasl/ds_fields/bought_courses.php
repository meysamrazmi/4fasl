<?php
function bought_courses($uid){
  $query = db_select('uc_orders', 'o');
  $query->join('uc_order_products', 'p', 'o.order_id = p.order_id');
  $query->join('uc_product_kits', 'k', 'k.product_id = p.nid');
  $results = $query->fields('k', array('nid'))->distinct()
    ->condition('o.uid', $uid)
    ->condition('o.order_status', array('completed', 'payment_received'), 'IN')
    ->execute()->fetchAll();
  $nids = array();
  foreach ($results as $row){
    array_push($nids, $row->nid);
  }
  $nodes = node_load_multiple($nids);
  if(sizeof($nids) > 0):
    ?>
    <div class="field-label field-label-main">فیلم های خریداری شده:&nbsp;</div>
    <?php
    foreach ($nodes as $node){
      $node_view = node_view($node, 'teaser');
      ?>
      <div class="col-md-4 col-xs-6  d-inline-block mb-4 kit-item">
        <?php print drupal_render($node_view); ?>
      </div>
      <?php
    }
  endif;
}

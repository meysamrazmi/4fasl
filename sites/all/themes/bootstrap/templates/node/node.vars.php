<?php

function bootstrap_preprocess_node(&$variables) {
  $node = $variables['node'];
  print($node->type);
  // Create preprocess functions per content type.
  $function = __FUNCTION__ . '_' . $node->type;
  if (function_exists($function)) {
    $function($variables);
  }
}

function bootstrap_preprocess_node_product_kit(&$variables) {
  $node = $variables['node'];
//  mdump($node);
}

<?php

/**
 * Themes the role expiration table on the account edit page.
 *
 * @param $variables
 *   An associative array containing:
 *   - form: A render element representing the form.
 *
 * @ingroup themeable
 */
function theme_functions_user_expiration($variables) {
  $form = $variables['form'];

  $header = array(
    array('data' => t('Make permanent')),
    array('data' => t('Role')),
    array('data' => t('Expiration')),
    array('data' => t('Add/remove time')),
    array('data' => t('Remove')),
  );

  $rows = array();
  // The expiration table.
  foreach ((array)$form['table'] as $rid => $expiration) {
    // We only want numeric rid's
    if (!is_numeric($rid)) {
      continue;
    }

    // Make sure the renders actually touch the elements.
    $data = &$form['table'][$rid];

    $rows[] = array(
      array('data' => drupal_render($data['remove'])),
      array('data' => check_plain($data['name']['#value'])),
      array('data' => format_date($data['expiration']['#value'], 'day_month') .' ('. floor(($data['expiration']['#value'] - time()) / (24*60*60)) .' روز)'),

      // Options to adjust the expiration.
      array('data' => '<a name="role-expiration-' . $rid . '">' .
                      '<div class="expiration">' .
                        drupal_render($data['polarity']) . drupal_render($data['qty']) . drupal_render($data['granularity']) .
                      '</div></a>'),
	  array('data' => drupal_render($data['cancel'])),
    );
  }
// mdump($data,true);
  $output = theme('table', array(
    'header' => $header,
    'rows' => $rows,
    'caption' => t('Below you can add or remove time to the expiration dates of the following roles.'),
    'empty' => t('There are no pending expirations for roles this user.'),
  ));
  $output .= drupal_render_children($form);

  return $output;
}

/**
 * Renders a product kit component.
 *
 * @ingroup themeable
 */
function theme_uc_product_kit_products($variables) {
  $product = $variables['product'];

  $node = node_load($product->nid);
  if (node_access('view', $node)) {
    $node_view = node_view($node, 'special_case');
    $node_view['add_to_cart']['#form']['actions']['submit']['#value'] = 'خرید';
    $title = render($node_view);
  }
  else {
    $title = check_plain($product->title);
  }

  return $title;
}
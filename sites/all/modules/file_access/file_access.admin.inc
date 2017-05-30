<?php

/**
 * @file
 * Admin settings for file_access module.
 */

/**
 * Admin settings form.
 */
function file_access_admin_settings($form, &$form_state) {
  if (!file_access_valid_setup()) {
    drupal_set_message(t('The File Access module only works on private files when the <a href="@filesystem">file system</a> is set to private. If you are seeing this message, your file system setting is \'public\'', array('@filesystem' => url('admin/config/media/file-system'))), 'warning');
  }
  // Global access settings.
  $form['file_access_global_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Global role access overrides'),
    '#description' => t('Settings in this area will turn on persistant global access to all files according to the settings.'),
  );
  $form['file_access_global_settings']['file_access_global_roles'] = array(
    '#type' => 'checkboxes',
    '#description' => t("Set the roles which will have global access to any file offered through Drupal's private method."),
    '#title' => t('Global role access'),
    "#default_value" => variable_get('file_access_global_roles', array()),
    '#options' => user_roles(),
  );
  // Per node access control.
  // $form['file_access_per_node_settings'] = array(
  //   '#type' => 'fieldset',
  //   '#title' => t('Control access per node'),
  //   '#description' => t('There may be situations where the same file is linked to multiple content items. In this case, you may wish to provide access on one item but not another. Leaving this unchecked, means any user or role given access, on any content item, will have universal access to that file.'),
  // );
  // $form['file_access_per_node_settings']['file_access_per_node'] = array(
  //   '#type' => 'checkbox',
  //   '#description' => t('Note: This only affects file access settings made after it has been checked. Any files using file access prior to this change, will not be accessible until udpated on their corresponding node.'),
  //   '#title' => t('Force access check per node'),
  //   "#default_value" => variable_get('file_access_per_node', 0),
  // );

  // No access redirect settings.
  $form['file_access_global_redirects'] = array(
    '#type' => 'fieldset',
    '#title' => t('Access denied options'),
    '#description' => t('These settings control what happens when a user does not have access to the protected file. You can optionally redirect the user to another location or another file.') . "\n" .
      t('Specify the path or file you wish to redirect a user to. Leave empty if you just want the default Access Denied. (e.g. node/123 or support/subscribe-now for a different location. For files use public://path/to/file.mp4 or private://path/to/file.mp4)'),
  );
  // Wrapper for redirect options
  $form['file_access_global_redirects']['file_access_redirect_mappings'] = array(
    '#type' => 'fieldset',
    '#tree' => TRUE,
    '#prefix' => '<div class="clearfix" id="file-access-redirect-mappings">',
    '#suffix' => '</div>',
    '#description' => t('You can use the asterisk "*" for all files. (e.g. * = support/subscribe will be the default for any non specified file extension.)'),
  );

  $redirect_map = variable_get('file_access_redirect_mappings', array());

  if (!empty($redirect_map)) {
    if (empty($form_state['file_access_redirect_count'])) {
      $form_state['file_access_redirect_count'] = count($redirect_map);
    }
    $extensions = array_keys($redirect_map);
    $paths = array_values($redirect_map);
  }
  if (empty($form_state['file_access_redirect_count'])) {
    $form_state['file_access_redirect_count'] = 1;
  }

  $fields = array(
    'ext-' => array(
        '#type' => 'textfield',
        '#default_value' => '',
        '#attributes' => array('style' => array('float:left; margin-right: 10px;')),
        '#size' => 4,
        ),
    'path-' => array(
        '#type' => 'textfield',
        '#default_value' => '',
        '#attributes' => array('style' => array('float:left; margin-right: 10px;')),
        '#size' => 40,
        ),
    'remove-' => array(
        '#type' => 'submit',
        '#value' => t('Remove'),
        '#submit' => array('file_access_global_redirect_remove'),
        ),
    );

  for ($i = 0; $i < $form_state['file_access_redirect_count']; $i++) {
    foreach ($fields as $section_name => $settings) {
      $form['file_access_global_redirects']['file_access_redirect_mappings'][$section_name . $i] = $settings;
      switch ($section_name) {
        case 'ext-':
          $form['file_access_global_redirects']['file_access_redirect_mappings'][$section_name . $i]['#default_value'] = $extensions[$i];
          break;

        case 'path-':
          $form['file_access_global_redirects']['file_access_redirect_mappings'][$section_name . $i]['#default_value'] = $paths[$i];
          break;

        case 'remove-':
          $form['file_access_global_redirects']['file_access_redirect_mappings'][$section_name . $i]['#name'] = $section_name . $i;
          break;
      }
    }
  }

  // Take off the first row remove button
  unset($form['file_access_global_redirects']['file_access_redirect_mappings']['remove-0']);
  // Cycle through any rows which have been removed
  if (isset($form_state['file_access_redirect_remove'])) {
    foreach ($form_state['file_access_redirect_remove'] as $row) {
      unset($form['file_access_global_redirects']['file_access_redirect_mappings'][$row]);
      unset($form['file_access_global_redirects']['file_access_redirect_mappings'][str_replace('remove', 'ext', $row)]);
      unset($form['file_access_global_redirects']['file_access_redirect_mappings'][str_replace('remove', 'path', $row)]);
    }
  }
  // $form['file_access_global_redirects']['file_access_redirect_mappings']['map']['path-0']['#suffix'] = '</div>';

  $form['file_access_global_redirects']['file_access_more'] = array(
    '#type' => 'submit',
    '#value' => t('Add another'),
    '#attributes' => array(
      'title' => t("If the amount of boxes above isn't enough, click here to add more choices."),
    ),
    '#weight' => 1,
    '#limit_validation_errors' => array(array('choice')),
    '#submit' => array('file_access_global_redirect_add'),
    '#ajax' => array(
      'callback' => 'file_access_global_redirect_callback',
      'wrapper' => 'file-access-redirect-mappings',
      'effect' => 'fade',
    ),
  );


  // Protected extensions settings.
  $form['file_access_protected_extensions'] = array(
    '#type' => 'fieldset',
    '#title' => t('Protected extensions'),
    '#description' => t('Optionally specify only those extensions you wish to protect from download. Leaving this area blank means all private files uploaded with be protected by file access.'),
  );
  $form['file_access_protected_extensions']['file_access_extensions'] = array(
    '#type' => 'textfield',
    '#title' => t('Extensions'),
    '#description' => t('Enter the extensions without the period and use a space between them. (e.g. mov mp3 m4a mp4 m4v)'),
    '#default_value' => variable_get('file_access_extensions', ''),
    '#size' => 40,
  );
  $form['#submit'][] = 'file_access_admin_submit';
  $form['#validate'][] = 'file_access_global_redirect_validate';
  // dd($form);
  return system_settings_form($form);
}

function file_access_admin_submit($form, &$form_state) {
 // Clean up the exentions map from $form_state
 // collecting the form parts such as ext-0 and path-0 and
 // putting them into a [mp4] => private://path/to/file.mp4
 $map = array();
 $values = $form_state['values']['file_access_redirect_mappings'];
 foreach ($values as $key => $value) {
    $keyparts = explode('-', $key);
    if ($keyparts[0] == 'ext') {
      $map[$value] = $values['path-' . $keyparts[1]];
    }
 }
 $form_state['values']['file_access_redirect_mappings'] = $map;
}

/**
 * Callback for global redirect add and remove buttons.
 */
function file_access_global_redirect_callback($form, $form_state) {
  // dd($form_state);
  // dd($form_state['triggering_element']);
  // dd($form['file_access_global_redirects']['file_access_redirect_mappings']);
  return $form['file_access_global_redirects']['file_access_redirect_mappings'];
}

/**
 * Submit handler for the global redirect add.
 */
function file_access_global_redirect_add($form, &$form_state) {
  $form_state['file_access_redirect_count']++;
  $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for the global redirect remove.
 */
function file_access_global_redirect_remove($form, &$form_state) {
  $form_state['file_access_redirect_remove'][] = array_pop($form_state['triggering_element']['#array_parents']);
  // No need to decrement because we just keep increasing the value used
  // this allows the remove to be available on each row and stored
  // $form_state['file_access_redirect_count']--;
  $form_state['rebuild'] = TRUE;
}

/**
 * Validate handler for the global redirect mappings.
 */
function file_access_global_redirect_validate($form, &$form_state) {
  $valid = TRUE;
  $mappings = $form_state['values']['file_access_redirect_mappings'];
  foreach ($mappings as $key => $path) {
    $internal_path = drupal_lookup_path('source', $path);
    $keyparts = explode('-', $key);
    if ($keyparts[0] == 'path') {
      // @todo show warning if file does not exit in file_managed
      if (!drupal_valid_path($path) && !drupal_valid_path($internal_path) && !file_valid_uri($path)) {
        drupal_set_message(t('The path <strong>@path</strong> for extension <strong>@ext</strong> does not appear to be a valid path.', array('@path' => $path, '@ext' => $mappings['ext-' . $keyparts[1]] )), 'warning');
      }
    }
  }
  return $valid;
}



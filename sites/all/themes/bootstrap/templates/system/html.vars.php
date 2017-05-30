<?php
/**
 * @file
 * Stub file for "html" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "html" theme hook.
 *
 * See template for list of available variables.
 *
 * @see html.tpl.php
 *
 * @ingroup theme_preprocess
 */
function bootstrap_preprocess_html(&$variables) {
  // Backport from Drupal 8 RDFa/HTML5 implementation.
  // @see https://www.drupal.org/node/1077566
  // @see https://www.drupal.org/node/1164926

  // HTML element attributes.
  $variables['html_attributes_array'] = array(
    'lang' => $variables['language']->language,
    'dir' => $variables['language']->dir,
  );

  // Override existing RDF namespaces to use RDFa 1.1 namespace prefix bindings.
  if (function_exists('rdf_get_namespaces')) {
    $rdf = array('prefix' => array());
    foreach (rdf_get_namespaces() as $prefix => $uri) {
      $rdf['prefix'][] = $prefix . ': ' . $uri;
    }
    if (!$rdf['prefix']) {
      $rdf = array();
    }
    $variables['rdf_namespaces'] = drupal_attributes($rdf);
  }

  // BODY element attributes.
  $variables['body_attributes_array'] = array(
    'role'  => 'document',
    'class' => &$variables['classes_array'],
  );
  $variables['body_attributes_array'] += $variables['attributes_array'];

  // Navbar position.
  switch (bootstrap_setting('navbar_position')) {
    case 'fixed-top':
      $variables['body_attributes_array']['class'][] = 'navbar-is-fixed-top';
      break;

    case 'fixed-bottom':
      $variables['body_attributes_array']['class'][] = 'navbar-is-fixed-bottom';
      break;

    case 'static-top':
      $variables['body_attributes_array']['class'][] = 'navbar-is-static-top';
      break;
  }
  
/**
 *
 * by meysam razmi to adding classes based on user
 */
  $loged_in_user = user_load($GLOBALS['user']->uid);
  $path = explode("/", current_path());
  if( ($path[0] == 'user' || $path[0] == 'users') && isset($path[1]) && is_numeric($path[1])){
  	$user = user_load(intval($path[1]));
  }else{
  	$user = $loged_in_user;
  }
  
  $variables['classes_array'][] = isset($loged_in_user)? 'uid-'. drupal_clean_css_identifier($loged_in_user->uid) : 'uid-0';
  foreach($loged_in_user->roles as $role) {
  	$variables['classes_array'][] = 'role-'. drupal_clean_css_identifier($role);
  }
  
  $expires = timetoexpire($user->uid);
  $variables['classes_array'][] = $expires['honarjo'] ? 'has-honarjo': '';
  $variables['classes_array'][] = $expires['vip']? 'has-vip': '';
	
	
  //for sidebar classes
  if (!empty($variables['page']['left_side']) && !empty($variables['page']['right_side'])) {
    $variables['classes_array'][] = 'two-sides has-side';
  }
  elseif (!empty($variables['page']['left_side']) || !empty($variables['page']['right_side'])) {
	$variables['classes_array'][] = 'one-sides has-side';
	if(!empty($variables['page']['left_side'])){
		$variables['classes_array'][] = 'left-sides';
	}
	else{
		$variables['classes_array'][] = 'right-sides';
	}
  }
  else {
    $variables['classes_array'][] = 'no-sides';
  }  
  
  /*
  * by meysam razmi to adding classes based on url alias
  */
  $path = drupal_get_path_alias();
  $aliases = explode('/', $path);
  foreach($aliases as $alias) {
    $variables['classes_array'][] = 'page-' . drupal_clean_css_identifier($alias);
  }
  if($aliases[0] == 'user'){
	if(count($aliases) == 1){
		if(!$user->uid){
			$query = $_GET;
			if(isset($query['destination'])){
				header('Location: user/login?destination='.$query['destination']);
				die();
			}
			drupal_goto('user/login');
		}
	}else if(count($aliases) == 2 && $aliases[1] == 'vip'){
		if(!$user->uid){
			$query = $_GET;
			if(isset($query['destination'])){
				header('Location: user/login?destination='.$query['destination']);
				die();
			}
			header('Location: /user/login?destination=user/vip');
			// drupal_goto('user/login');
			die();
		}
	}
  }
  // $real_aliases = explode('/', $_GET['q']);
  // if($user->uid == 1){
	 // print_r($aliases);
	 // die();
  // }
  // if($real_aliases[0] == 'user'){
	// if(count($aliases) == 2){
		// if(!$user->uid){
			// drupal_goto('user/login');
		// }
	// }
  // }
}

/**
 * Processes variables for the "html" theme hook.
 *
 * See template for list of available variables.
 *
 * @see html.tpl.php
 *
 * @ingroup theme_process
 */
function bootstrap_process_html(&$variables) {
  $variables['html_attributes'] = drupal_attributes($variables['html_attributes_array']);
  $variables['body_attributes'] = drupal_attributes($variables['body_attributes_array']);
}


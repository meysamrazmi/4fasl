<?php

function site_setting(){

	$tabale_header = array(
		t('id'),
		t('Type'),
//		t('Attribute Id'),
		t('Persian Name'),
		t('English Name'),
		t('Option Id'),
    'nid محتوای معرفی',
		t('Ostad'),
		t('Teacher Option Id'),
		t('Link'),
		t('Teacher Intro'),
		t('Manage'),
	);

	$rows = db_select('site_settings', 's')->extend('PagerDefault')->extend('TableSort')->limit(50)->fields('s', array())->orderBy('id', 'ASC')->execute()->fetchAll();
	//mdump($rows , true);
	foreach ($rows as $row) {
		$ostad = user_load($row->ostad_uid);
		$table_rows[] = array(
			$row->id,
			t($row->type),
//			$row->aid,
			$row->persian_name,
			$row->name,
			$row->oid,
      $row->intro_nid,
			'<a href="/user/'. $row->ostad_uid .'" style="display: inline-flex;align-items: center;">'.
				isset($ostad->picture->uri)? theme('image_style',
				array(
					'style_name' => '100x100', 'path' => $ostad->picture->uri,
					'attributes' => array('style' =>"border-radius: 50%;width: 80px;height: 80px; margin-left:10px;")
				)) : ''.
				$ostad->field_naame['und'][0]['value'] . '</a></div>',
			$row->Teacher_OptionId,
			!is_null($row->teacher_link) ? '<a href="'. $row->teacher_link .'" class="button" target="_blank">فیلم ها</a>' : '',
			substr(strip_tags($row->Teacher_Intro), 0, 100) . '....',
			'<a href="/admin/4fasl-setting/'. $row->id .'/edit">ویرایش</a>',
		);
	}
	$output =
	'<div style="text-align: left;margin: 20px 0;display: inline-block;width: 100%;">
		<a href="/admin/4fasl-setting/add" class="btn btn-primary button">افزودن سطر جدید</a>
	</div>';
	$output .= theme('table', array('header' => $tabale_header, 'rows' => $table_rows)).theme('pager');
	$output .=
	'<div style="text-align: left;margin: 20px 0;display: inline-block;width: 100%;">
		<a href="/admin/4fasl-setting/add" class="btn-primary button btn">افزودن سطر جدید</a>
	</div>';
	return $output;
}

function add_site_setting($form, $form_state){
	if (!is_array($form)) {
		$form = array();
	}

	$form['type'] = array(
		'#type' => 'select',
		'#title' => t('Type'),
		'#options' => array(
			'both' => t('both'),
			'online' => t('online'),
			'offline' => t('offline')
        ),
	);
	$form['persian_name'] = array(
		'#type' => 'textfield',
		'#title' => t('Persian Name'),
	);
	$form['name'] = array(
		'#type' => 'textfield',
		'#title' => t('English Name'),
	);
	$form['oid'] = array(
		'#type' => 'textfield',
		'#title' => t('Option Id'),
		'#description' => 'لیست <a href="/admin/store/products/attributes/3/options" target="_blank">گزینه ها</a>'
	);
  $form['intro_nid'] = array(
    '#type' => 'textfield',
    '#title' => 'nid محتوای معرفی دوره',
  );
	$form['ostad_uid'] = array(
		'#type' => 'textfield',
		'#title' => t('Ostad'),
	);
	$form['Teacher_OptionId'] = array(
		'#type' => 'textfield',
		'#title' => t('Teacher Option Id'),
		'#description' => 'لیست <a href="/admin/store/products/attributes/7/options" target="_blank">گزینه ها</a>'
	);
	$form['teacher_link'] = array(
		'#type' => 'textfield',
		'#title' => t('Teacher Link'),
	);
	$form['Teacher_Intro'] = array(
		'#type' => 'text_format',
		'#format' => 'full_html',
		'#title' => t('Teacher Intro'),
	);
	$form['aid'] = array(
		'#type' => 'textfield',
		'#title' => t('Attribute Id'),
		'#default_value' => 3,
		'#description' => 'نیازی به تغییر نیست',
	);

	$form['submit'] = array(
		'#type' => 'submit',
		'#value' => t('Submit'),
	);
	return $form;
}

function edit_site_setting($form, $form_state, $id){
	if (!is_array($form)) {
		$form = array();
	}

	$result = db_select('site_settings', 's')
				->fields('s', array())
				->condition('id', $id)
				->execute()->fetchObject();

	$form['type'] = array(
		'#type' => 'select',
		'#title' => t('Type'),
		'#options' => array(
			'both' => t('both'),
			'online' => t('online'),
			'offline' => t('offline')
        ),
		'#default_value' => $result->type,
	);
	$form['markup'] = array(
		'#title' => t('Id'),
		'#markup' => 'شناسه : '. $result->id,
	);
	$form['id'] = array(
		'#type' => 'hidden',
		'#value' => $result->id,
		'#title' => t('Id'),
	);
	$form['persian_name'] = array(
		'#type' => 'textfield',
		'#title' => t('Persian Name'),
		'#default_value' => $result->persian_name,
	);
	$form['name'] = array(
		'#type' => 'textfield',
		'#title' => t('English Name'),
		'#default_value' => $result->name,
	);
	$form['oid'] = array(
		'#type' => 'textfield',
		'#title' => t('Option Id'),
		'#default_value' => $result->oid,
		'#description' => 'لیست <a href="/admin/store/products/attributes/3/options" target="_blank">گزینه ها</a>'
	);
  $form['intro_nid'] = array(
    '#type' => 'textfield',
    '#title' => 'nid محتوای معرفی دوره',
    '#default_value' => $result->intro_nid,
  );
	$ostad = user_load($result->ostad_uid);
	$form['ostad_uid'] = array(
		'#type' => 'textfield',
		'#title' => t('Ostad'),
		'#default_value' => $result->ostad_uid,
		'#prefix' => '<div style="display: flex;align-items: center;">',
		'#suffix' => '<a href="/user/'. $result->ostad_uid .'" style="margin: 0 20px;display: inline-flex;align-items: center;">'.
		theme('image_style',
		array(
			'style_name' => '100x100', 'path' => $ostad->picture->uri,
			'attributes' => array('style' =>"border-radius: 50%;width: 80px;height: 80px; margin-left:10px;")
		)) .
		$ostad->field_naame['und'][0]['value'] . '</a></div>',
	);
	$form['Teacher_OptionId'] = array(
		'#type' => 'textfield',
		'#title' => t('Teacher Option Id'),
		'#default_value' => $result->Teacher_OptionId,
		'#description' => 'لیست <a href="/admin/store/products/attributes/7/options" target="_blank">گزینه ها</a>'
	);
	$form['teacher_link'] = array(
		'#type' => 'textfield',
		'#title' => t('Teacher Link'),
		'#default_value' => $result->teacher_link,
	);
	$form['Teacher_Intro'] = array(
		'#type' => 'text_format',
		'#format' => 'full_html',
		'#title' => t('Teacher Intro'),
		'#default_value' => $result->Teacher_Intro,
		'#description' => '<div style="line-height: 0;margin: 20px 0;background: #f5f5f5;padding: 15px 10px 5px;">'. isset($ostad->field_tea_bio['und'][0]['value'])? $ostad->field_tea_bio['und'][0]['value'] : '' .'</div>',
	);
	$form['aid'] = array(
		'#type' => 'textfield',
		'#title' => t('Attribute Id'),
		'#default_value' => $result->aid,
		'#description' => 'نیازی به تغییر نیست',
	);

	$form['submit'] = array(
		'#type' => 'submit',
		'#value' => t('Submit'),
	);

	return $form;
}

function add_site_setting_submit($form, &$form_state){
	db_insert('site_settings')
		->fields(array(
			'type' => 					$form_state['values']['type'],
			'aid' => 						$form_state['values']['aid'],
			'oid' => 						$form_state['values']['oid'],
			'intro_nid' =>      $form_state['values']['intro_nid'],
			'persian_name' => 	$form_state['values']['persian_name'],
			'name' => 					$form_state['values']['name'],
			'ostad_uid' => 			$form_state['values']['ostad_uid'],
			'teacher_link' => 	$form_state['values']['teacher_link'],
			'Teacher_OptionId' => 	$form_state['values']['Teacher_OptionId'],
			'Teacher_Intro' => 	$form_state['values']['Teacher_Intro']['value'],
			))
		->execute();
	$form_state['redirect'] = 'admin/4fasl-setting';
}

function edit_site_setting_submit($form, &$form_state){
	db_update('site_settings')
		->fields(array(
			'type' => 					$form_state['values']['type'],
			'aid' => 						$form_state['values']['aid'],
			'oid' => 						$form_state['values']['oid'],
      'intro_nid' =>      $form_state['values']['intro_nid'],
			'persian_name' => 	$form_state['values']['persian_name'],
			'name' => 					$form_state['values']['name'],
			'ostad_uid' => 			$form_state['values']['ostad_uid'],
			'teacher_link' => 	$form_state['values']['teacher_link'],
			'Teacher_OptionId'=>$form_state['values']['Teacher_OptionId'],
			'Teacher_Intro' => 	$form_state['values']['Teacher_Intro']['value'],
			))
		->condition('id', $form_state['values']['id'])
		->execute();
	$form_state['redirect'] = 'admin/4fasl-setting';
}

function edit_relationship($form, $form_state, $relationship){
	$user = user_load($relationship->requester_id);
	$suffix =  '<a href="/user/' . $user->uid . '" style="margin: 0 20px;display: inline-flex;align-items: center;">';
	if (isset($user->picture)) {
		$suffix .=  theme('image_style', array('style_name' => '100x100', 'path' => $user->picture->uri, 'attributes' => array('style' =>"border-radius: 50%;width: 80px;height: 80px; margin-left:10px;"))) ;
	}
	else{
		$suffix .= '<img src="https://4faslmusic.ir/sites/all/themes/bootstrap/images/user-100.png" width="100px" height=100px" style="border-radius: 50%;width: 80px;height: 80px; margin-left:10px;">';
	}
	$suffix .= $user->field_naame['und'][0]['value'] . '</a></div>';

	$form['user'] = array(
		'#type' => 'textfield',
		'#title' => t('User'),
		'#default_value' => $user->name,
		'#autocomplete_path' => 'user/autocomplete',
		'#prefix' => '<div style="display: flex;align-items: center;">',
		'#suffix' => $suffix,
	);
	$ostad = user_load($relationship->requestee_id);
	$form['ostad'] = array(
		'#type' => 'textfield',
		'#title' => t('Ostad'),
		'#default_value' => $ostad->name,
		'#autocomplete_path' => 'user/autocomplete',
		'#prefix' => '<div style="display: flex;align-items: center;">',
		'#suffix' => '<a href="/user/'. $ostad->uid .'" style="margin: 0 20px;display: inline-flex;align-items: center;">'.
		theme('image_style',
		array(
			'style_name' => '100x100', 'path' => $ostad->picture->uri,
			'attributes' => array('style' =>"border-radius: 50%;width: 80px;height: 80px; margin-left:10px;")
		)) .
		$ostad->field_naame['und'][0]['value'] . '</a></div>',
	);
	$form['type'] = array(
		'#type' => 'select',
		'#title' => t('Type'),
		'#options' => array(
			'1' => "هنرجوی عادی",
			'3' => "vip",
        ),
		'#default_value' => $relationship->rtid,
	);
	$form['id'] = array(
		'#type' => 'hidden',
		'#value' => $relationship->rid,
		'#title' => t('Id'),
	);
	$form['submit'] = array(
		'#type' => 'submit',
		'#value' => t('Submit'),
	);
	return $form;
}

function edit_relationship_submit($form, &$form_state){
	$relationship = user_relationships_load($form_state['values']['id']);

	$user = user_load_by_name($form_state['values']['user']);
	$ostad = user_load_by_name($form_state['values']['ostad']);

	$relationship->requester_id = $user->uid;
	$relationship->requestee_id = $ostad->uid;
	$relationship->rtid = $form_state['values']['type'];
	$rel = user_relationships_save_relationship($relationship);

	$form_state['redirect'] = array('admin/people/relationships', array('query' => array('requester_id' => $user->name)));
}

function add_relationship($form, $form_state){
	$form['user'] = array(
		'#type' => 'textfield',
		'#title' => t('User'),
		'#autocomplete_path' => 'user/autocomplete',
	);
	$form['ostad'] = array(
		'#type' => 'textfield',
		'#title' => t('Ostad'),
		'#autocomplete_path' => 'user/autocomplete',
	);
	$form['type'] = array(
		'#type' => 'select',
		'#title' => t('Type'),
		'#options' => array(
			'1' => "هنرجوی عادی",
			'3' => "vip",
        ),
	);
	$form['submit'] = array(
		'#type' => 'submit',
		'#value' => t('Submit'),
	);
	return $form;
}

function add_relationship_submit($form, &$form_state){
	$user = user_load_by_name($form_state['values']['user']);
	$ostad = user_load_by_name($form_state['values']['ostad']);

	user_relationships_request_relationship($user, $ostad , $form_state['values']['type'] , true);
	$form_state['redirect'] = array('admin/people/relationships', array('query' => array('requester_id' => $user->name)));
}


function site_rules_form($form){
  $form = array();
  $result = db_select('site_rules', 's')
    ->fields('s', array())
    ->execute()->fetchAll();

  foreach ($result as $row){
    $form[$row->name] = array(
      '#type' => 'fieldset',
      '#title' => $row->p_name,
      '#collapsed' => true,
      '#collapsible' => true
    );
    $form[$row->name]['id'. $row->id] = array(
      '#type' => 'hidden',
      '#default_value' => $row->id,
    );
    $form[$row->name]['body'. $row->id] = array(
      '#type' => 'text_format',
      '#format' => 'full_html',
      '#rows' => 10,
      '#default_value' => $row->body,
    );
  }
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
  );
  return $form;
}

function site_rules_form_submit($form, &$form_state){
  $result = db_select('site_rules', 's')
    ->fields('s', array())
    ->execute()->fetchAll();

  foreach ($result as $row){
    db_update('site_rules')
      ->fields(array('body' => $form_state['values']['body'. $row->id]['value']))
      ->condition('id', $row->id)
      ->execute();
  }

  $form_state['redirect'] = 'admin/4fasl-setting/rules';
}

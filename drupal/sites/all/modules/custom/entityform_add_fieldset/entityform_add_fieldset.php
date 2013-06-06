
<?php

/**
* Implements Entityform's hook_form_alter().
*/
function entityform_add_fieldset_form_alter(&$form, &$form_state, $form_id) {
    switch ($form_id) {
	    case 'also_course_reserves_entityform_edit_form' :
		/*  $form['#fieldgroups']['group_add_phys_items ']
			
			  if ($form['field_add_another_button']['und']['#value_key'] == 1) {
			    echo 'yes';
			}
		
			$form['field_add_another_button']['#type'] = 'button';
			$form['field_add_another_button']['#value'] = 'Add Another';
			
		$form['Add'] = array(
        '#type'=>'button',
        '#value' => t('Add more'),
        '#id' => 'webform-client-form-200',
       );*/

	krumo($form);
	
		break;
	}
}

//
function entityform_add_fieldset_library() {
  $path = drupal_get_path('module', 'entityform_add_fieldset');
  $libraries['addmore'] = array(
    'title' => 'AddMore',
    'website' => 'http://drupal.org/node/323112',
    'version' => '1.0',
    'js' => array(
      $path . '/entityform_add_fieldset.js' => array(),
    ),
	);
}


/**
* Implements Field Group's hook_field_group_formatter_info().
*/
function entityform_add_fieldset_field_group_formatter_info() {
  return array(
    'form' => array(
      'AddMore' => array(
        'label' => t('Add Another'),
        'description' => t('add another book'),
        'format_types' => array('open', 'collapsible', 'collapsed'),
        'default_formatter' => 'collapsible',
		'instance_settings' => array('classes' => '', 'page_header' => 3, 'move_additional' => 1, 'page_counter' => 1, 'move_button' => 0),

      ),
    ),
  );
  
} 
function entityform_add_fieldset_field_group_pre_render(&$element, $group, &$form) {

	switch ($group->format_type) {
		 case 'AddMore':
		  $element['#attached']['js'][] = drupal_get_path('module', 'entityform_add_fieldset') . '/entityform_add_fieldset.js';
  $path = drupal_get_path('module', 'entityform_add_fieldset');
  $libraries['addmore'] = array(
    'title' => 'AddMore',
    'website' => 'http://drupal.org/node/323112',
    'version' => '1.0',
    'js' => array(
      $path . '/entityform_add_fieldset.js' => array(),
    ),
	);
		 
		 break;
	}

	
}


/**
* Implements Field Group's hook_field_group_pre_render_alter() with properties of multipage.
*/

function entityform_add_fieldset_field_group_pre_render_alter(&$element, $group, &$form) {
//MODIFY to become add_element
  $add_element = array(
    '#type' => 'AddMore',
    '#title' => check_plain(t($group->label)),
  //  '#theme_wrappers' => array('multipage'),
    '#prefix' => '<div class="field-group-' . $group->format_type . '-wrapper ' . $group->classes . '">',
    '#suffix' => '</div>',
  );

  $element += $add_element;

  $move_additional = isset($group->format_settings['instance_settings']['move_additional']) ? ($group->format_settings['instance_settings']['move_additional'] && isset($form['additional_settings'])) : isset($form['additional_settings']);
  $move_button = isset($group->format_settings['instance_settings']['move_button']) ? $group->format_settings['instance_settings']['move_button'] : 0;

  drupal_add_js(array(
    'field_group' => array(
      'addmore_move_submit' => (bool) $move_button,
      'addmore_move_additional' => (bool) $move_additional
    )
  ), 'setting');
  
  
  
}



//+++++++++++++++++++++++++++++++++++++++++++++++
 /**
* Implements Field Group's hook_field_group_formatter_info().
*/
 /* 
function entityform_add_fieldset_field_group_formatter_info() {
  return array(
    'form' => array(
      'AddMore' => array(
        'label' => t('Add Another'),
        'description' => t('add another book'),
        'format_types' => array('open', 'collapsible', 'collapsed'),
        'default_formatter' => 'collapsible',
		'instance_settings' => array('classes' => '', 'page_header' => 3, 'move_additional' => 1, 'page_counter' => 1, 'move_button' => 0),
     
      ),
    ),
  );
  
}


*/

 /**
* Implements Field Group's hook_field_group_format_settings().
* Implements Instance settings: page_header', 'move_additional' , 'page_counter' , 'move_button' from multipage
*/
/*
function entityform_add_fieldset_field_group_format_settings($group) {
  $form = array(
    'instance_settings' => array(
      '#tree' => TRUE,
      '#weight' => 2,
    ),
  );

  $field_group_types = field_group_formatter_info();
  $mode = $group->mode == 'form' ? 'form' : 'display';
  $formatter = $field_group_types[$mode][$group->format_type];

  // Add the required formatter type selector.
  if (isset($formatter['format_types'])) {
    $form['formatter'] = array(
      '#title' => t('Fieldgroup settings'),
      '#type' => 'select',
      '#options' => drupal_map_assoc($formatter['format_types']),
      '#default_value' => isset($group->format_settings['formatter']) ? $group->format_settings['formatter'] : $formatter['default_formatter'],
      '#weight' => 1,
    );
  }

  if (isset($formatter['instance_settings']['required_fields']) && $mode == 'form') {
    $form['instance_settings']['required_fields'] = array(
      '#type' => 'checkbox',
      '#title' => t('Mark group for required fields.'),
      '#default_value' => isset($group->format_settings['instance_settings']['required_fields']) ? $group->format_settings['instance_settings']['required_fields'] : (isset($formatter['instance_settings']['required_fields']) ? $formatter['instance_settings']['required_fields'] : ''),
      '#weight' => 2,
    );
  }

  if (isset($formatter['instance_settings']['classes'])) {
    $form['instance_settings']['classes'] = array(
      '#title' => t('Extra CSS classes'),
      '#type' => 'textfield',
      '#default_value' => isset($group->format_settings['instance_settings']['classes']) ? $group->format_settings['instance_settings']['classes'] : (isset($formatter['instance_settings']['classes']) ? $formatter['instance_settings']['classes'] : ''),
      '#weight' => 3,
      '#element_validate' => array('field_group_validate_css_class'),
    );
  }
  if (isset($formatter['instance_settings']['description'])) {
    $form['instance_settings']['description'] = array(
      '#title' => t('Description'),
      '#type' => 'textarea',
      '#default_value' => isset($group->format_settings['instance_settings']['description']) ? $group->format_settings['instance_settings']['description'] : (isset($formatter['instance_settings']['description']) ? $formatter['instance_settings']['description'] : ''),
      '#weight' => 0,
    );
  }
   $form['instance_settings']['page_header'] = array(
        '#title' => t('Format page title'),
        '#type' => 'select',
        '#options' => array(0 => t('None'), 1 => t('Label only'), 2 => t('Step 1 of 10'), 3 => t('Step 1 of 10 [Label]'),),
        '#default_value' => isset($group->format_settings['instance_settings']['page_header']) ? $group->format_settings['instance_settings']['page_header'] : $formatter['instance_settings']['page_header'],
        '#weight' => 1,
      );
      $form['instance_settings']['page_counter'] = array(
        '#title' => t('Add a page counter at the bottom'),
        '#type' => 'select',
        '#options' => array(0 => t('No'), 1 => t('Format 1 / 10'), 2 => t('The count number only')),
        '#default_value' => isset($group->format_settings['instance_settings']['page_counter']) ? $group->format_settings['instance_settings']['page_counter'] : $formatter['instance_settings']['page_counter'],
        '#weight' => 2,
      );
      $form['instance_settings']['move_button'] = array(
        '#title' => t('Move submit button to last addmore'),
        '#type' => 'select',
        '#options' => array(0 => t('No'), 1 => t('Yes')),
        '#default_value' => isset($group->format_settings['instance_settings']['move_button']) ? $group->format_settings['instance_settings']['move_button'] : $formatter['instance_settings']['move_button'],
        '#weight' => 3,
      );
      $form['instance_settings']['move_additional'] = array(
        '#title' => t('Move additional settings to last addmore (if available)'),
        '#type' => 'select',
        '#options' => array(0 => t('No'), 1 => t('Yes')),
        '#default_value' => isset($group->format_settings['instance_settings']['move_additional']) ? $group->format_settings['instance_settings']['move_additional'] : $formatter['instance_settings']['move_additional'],
        '#weight' => 4,
      );
	return $form;
};
*/
 /**
* Implements Field Group's hook_field_group_pre_render(),
* adds jQuery
*/
/*
function entityform_add_fieldset_field_group_pre_render(&$element, $group, &$form) {
 $element['#attached']['js'][] = drupal_get_path('module', 'entityform_add_fieldset') . '/entityform_add_fieldset.js';
 //'sites/all/modules/custom/entityform_add_fieldset/entityform_add_fieldset.js';
 
 
}*/
 /**
* Implements Field Group's hook_field_group_pre_render_alter().
* Makes new fieldgriup have properties of Fieldsetshould attach button similar to that in multipage_group
*/
/*
// opportunity to alter the complete form or structure of elements. 
//You could do all sorts of things here, but most of them will be 
//corrections to the built already processed by fields and field_group.
function entityform_add_fieldset_field_group_pre_render_alter(&$element, $group, &$form) {

  $element += array(
    '#type' => 'fieldset',
    '#title' => check_plain(t($group->label)),
    //'#collapsible' => $group->collapsible,
   // '#collapsed' => $group->collapsed,
  //  '#pre_render' => array(), 
	'#prefix' => '<div class="field-group-' . $group->format_type . '-wrapper ' . $group->classes . '">',
    '#suffix' => '</div>',
    '#attributes' => array('class' => explode(' ', $group->classes)),
    '#description' => $group->description,
  );

  $move_additional = isset($group->format_settings['instance_settings']['move_additional']) ? ($group->format_settings['instance_settings']['move_additional'] && isset($form['additional_settings'])) : isset($form['additional_settings']);
  $move_button = isset($group->format_settings['instance_settings']['move_button']) ? $group->format_settings['instance_settings']['move_button'] : 0;

  drupal_add_js(array(
    'field_group' => array(
      'addmore_move_submit' => (bool) $move_button,
      'addmore_move_additional' => (bool) $move_additional
    )
  ), 'setting');
}

*/

?>

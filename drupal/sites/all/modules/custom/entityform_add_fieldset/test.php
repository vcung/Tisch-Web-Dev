
<?php
/*could use ajax on form or custom fieldset to add more, both have problems w/ submission*/

/**
* Implements Entityform's hook_form_alter().
*/ 
function entityform_add_fieldset_form_alter(&$form, &$form_state, $form_id) {
	switch ($form_id) {
	  case 'also_course_reserves_entityform_edit_form' :

	    if (isset($form_state['num_fields'])) {
		    $form_state['num_fields'] = $form_state['num_fields'] + 1; 
		}
		else {
		    $form_state['num_fields'] = 1;
		}
	     //add more items button
		$form['field_wrapper'] = array(
		    '#title' => t('Place a Book, Score, CD or other Recording on Reserve'),
			'#tree' => TRUE,
			'#collapsible' => TRUE,
            '#collapsed' => FALSE,
			'#type' => 'fieldset',
			'#access' => TRUE,
			'#attributes' => array('id' => array('add-another')),
		    '#prefix' => '<div id = "additional_fields-div">',
			'#suffix' => '</div>',
		);

		$num_checkboxes =  !empty($form_state['num_fields']) ? $form_state['num_fields'] : 1;  
		for ($i = 1; $i <= $num_checkboxes; $i++) {
			$form['field_wrapper'][$i] = array(
				'#tree' => TRUE,
			);
			
 			$form['field_wrapper'][$i]['item_format'] = array (
				'#title' => t('Format'),
				'#type' => 'radios',
				'#options' => array(
					'Book' => 'book', 
					'Score' => 'score', 
					'CD (or other recording)' => 'CD (or other recording)' , 
					'Video' => 'Video',
				),
			);
			$form['field_wrapper'][$i]['call_num'] = array (
				'#type' => 'textfield',
				'#title' => t('Call number'),
			);
			$form['field_wrapper'][$i]['Title'] = array (
				'#type' => 'textfield',
				'#title' => t('Title of Book or Work: '),
				//'#required' => TRUE,

			);
			$form['field_wrapper'][$i]['author'] = array (
				'#type' => 'textfield',
				'#title' => t('Author, Editor or Composer'),
			);
			$form['field_wrapper'][$i]['preferred_performer'] = array (
				'#type' => 'textfield',
				'#title' => t('Preferred Performer (if applicable)'),
			);
			$form['field_wrapper'][$i]['Publisher'] = array (
				'#type' => 'textfield',
				'#title' => t('Publisher'),
			);
			$form['field_wrapper'][$i]['year'] = array (
				'#type' => 'textfield',
				'#title' => t('Year if a specific year is required.'),
				'#maxlength' => 4,
				'#size' => 4,
			);
			$form['field_wrapper'][$i]['Edition'] = array (
				'#type' => 'textfield',
				'#title' => t('Edition if a specific edition is required.'),
				'#maxlength' => 20,
				'#size' => 20,
			);
			$form['field_wrapper'][$i]['circulation_type'] = array (
				'#title' => t('Type of Circulation: '),
				'#type' => 'radios',
				'#options' => array(
					'Room Use (4 Hours)' => 'Room Use (4 Hours)', 
					'8 hours/Overnight' => '8 hours/Overnight', 
					'3 Days' => '3 Days' , 
					'7 Days' => '7 Days'
				),
			//	'#required' => TRUE,
			);
			$form['field_wrapper'][$i]['supplied'] = array (
				'#title' => t('Supplied by Instructor?'),
				'#type' => 'radios',
				'#options' => array('Yes' => 'Yes', 'No' => 'No', ),
			);
		}
	
		$form['add_button'] = array (
			'#type' => 'button',
			'#value' => 'click',
		//	'#weight' => 999,
		//	'#submit' => 'entityform_add_fieldset_add_more',
			'#ajax' => array ( 
				'callback' => 'entityform_add_fieldset_add_more_callback',
				'wrapper' => 'additional_fields-div',
				//'method' => 'replace',
				'effect' => 'fade',
				),
		);
		//overwriting entityform's default submit
		//unset ($form['actions']['submit']['#submit']);
		//$form['#submit'] =  array( 'entityform_add_fieldset_submit_alter');
		
//krumo($form_state);
krumo($form);
       return $form;
		

		break;
		default:
	}
}

function entityform_add_fieldset_add_more_callback($form, $form_state) {

 $form_state['rebuild'] = TRUE;
	return $form['field_wrapper'];
}

function entityform_add_fieldset_submit_alter($form, $form_state) {
$node = node_form_submit_build_node($form, $form_state);

 /*$insert = empty($node->nid);
  node_save($node);
   $node_link = l(t('view'), 'node/' . $node->nid);
  $watchdog_args = array(
    '@type' => $node->type,
    '%title' => $node->title,
  );
  $t_args = array(
    '@type' => node_type_get_name($node),
    '%title' => $node->title,
  );
*/   //$form_state['values']['nid'] = $node->nid;
   // $form_state['nid'] = $node->nid;
  //  $form_state['redirect'] = node_access('view', $node) ? 'node/' . $node->nid : 
 //$form_state['values']['field_wrapper']= $form['field_wrapper'];
 
 //cache_clear_all();
 
 $info = entity_get_info($entity_type);
  list(, , $bundle) = entity_extract_ids($entity_type, $entity);

  // Copy top-level form values that are not for fields to entity properties,
  // without changing existing entity properties that are not being edited by
  // this form. Copying field values must be done using field_attach_submit().
  $values_excluding_fields = $info['fieldable'] ? array_diff_key($form_state['values'], field_info_instances($entity_type, $bundle)) : $form_state['values'];
  foreach ($values_excluding_fields as $key => $value) {
    $entity->$key = $value;
  }

  // Invoke all specified builders for copying form values to entity properties.
  if (isset($form['#entity_builders'])) {
    foreach ($form['#entity_builders'] as $function) {
      $function($entity_type, $entity, $form, $form_state);
    }
  }

  // Copy field values to the entity.
  if ($info['fieldable']) {
    field_attach_submit($entity_type, $entity, $form, $form_state);
  }
}

/******
Creates custom Field_group called "New Fieldset". Uses jQuery to create "add more" functionality
*******/

/**
* Implements Field Group's hook_field_group_formatter_info().
*/
function entityform_add_fieldset_field_group_formatter_info() {
  return array(
    'form' => array(
     'Newfieldset' => array(
        'label' => t('New Fieldset'),
     //   'description' => t('This fieldgroup renders the inner content in a fieldset with the titel as legend.'),
      //  'format_types' => array('open', 'collapsible', 'collapsed'),
        'instance_settings' => array('description' => '', 'classes' => '', 'page_header' => 3, 'page_counter' => 1, 'more_button' => 1),
        'default_formatter' => 'collapsible',
      ),
    ),
  );
  
} 

/**
* Implements Field Group's hook_field_group_pre_render_alter().
*/
function entityform_add_fieldset_field_group_pre_render_alter(&$element, $group, &$form) {

  if ($group->format_type == "Newfieldset") {
    $element += array(
		'#type' => 'fieldset',
		'#title' => check_plain(t($group->label)),
		'#collapsible' => $group->collapsible,
		'#collapsed' => $group->collapsed,
		//'#pre_render' => array(),
		'#prefix' => '<div id="NewFieldsetTest" class="field-group-' . $group->format_type . '-wrapper ' . $group->classes . '">',
		'#suffix' => '<input type="button" class="entityform-add-book" value="Add Another" /></div>' ,

		'#attributes' => array('class' => explode(' ', $group->classes)),
		'#description' => $group->description,
  );

   $element['#attached']['js'][] = drupal_get_path('module', 'entityform_add_fieldset') . '/entityform_add_fieldset.js';
 
  }
}





function entityform_add_fieldset_add_more($form, $form_state) {
    
   // Set the form to rebuild and run submit handlers.
 //  node_form_submit_build_node($form, $form_state);
 
    $i = $form_state['num_fields'];
   // Make the changes we want to the form state.
  /* if ($form_state['num_fields']) {
		$new_fields = array();
		$new_fields['format'] = $form['field_wrapper']['add_fields']['new_field']['format'.$i];
		$new_fields['call_num'] = $form['field_wrapper']['add_fields']['new_field']['call_num'.$i];
		$new_fields['title']= $form['field_wrapper']['add_fields']['new_field']['title'.$i];
		$new_fields['author']= $form['field_wrapper']['add_fields']['new_field']['author'.$i];
		$new_fields['preferred_performer']= $form['field_wrapper']['add_fields']['new_field']['preferred_performer'.$i];
		$new_fields['publisher']= $form['field_wrapper']['add_fields']['new_field']['publisher'.$i];
		$new_fields['year']= $form['field_wrapper']['add_fields']['new_field']['year'.$i];
		$new_fields['edition']= $form['field_wrapper']['add_fields']['new_field']['edition'.$i];
		$new_fields['circulation_type']= $form['field_wrapper']['add_fields']['new_field']['circulation_type'.$i];
		$new_fields['supplied']= $form['field_wrapper']['add_fields']['new_field']['supplied'.$i];
		$form_state['value']['new_fields'.$i] = $new_fields;
  } */
    $form_state['rebuild'] = TRUE;
   //$form_state['num_fields']++; 
 //  
}
function entityform_add_fieldset_add_more_callback($form, $form_state) {
	return render($form['field_wrapper']);
}





  function entityform_add_fieldset_add_name($form, &$form_state) {
  // Everything in $form_state is persistent, so we'll just use
 
     $form_state['num']++;
  $form_state['rebuild'] = TRUE;
}


function entityform_add_fieldset_field_group_pre_render_alter(&$element, $group, &$form) {
//add_element = array(
    if ($group->format_type == "Newfieldset") {
  $element += array(
    '#type' => 'fieldset',
    '#title' => check_plain(t($group->label)),
    '#collapsible' => $group->collapsible,
    '#collapsed' => $group->collapsed,
    //'#pre_render' => array(),
	'#prefix' => '<div id="NewFieldTest" class="field-group-' . $group->format_type . '-wrapper ' . $group->classes . '">',
    '#suffix' => '<input type="button" class="form-submit entityform-add-book" value="AddAnother" /></div>' ,

    '#attributes' => array('class' => explode(' ', $group->classes)),
    '#description' => $group->description,
  );
   $element['#attached']['js'][] = drupal_get_path('module', 'entityform_add_fieldset') . '/entityform_add_fieldset.js';
  $element['#attached']['js'][] = 'misc/form.js';
  $element['#attached']['js'][] = 'misc/collapse.js';  
  }
}
?>




//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
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
        drupal_get_path('module', 'entityform_add_fieldset') . '/entityform_add_fieldset.js';
		krumo($form);
	
		break;
	}
}



/**
* Implements Field Group's hook_field_group_formatter_info().
*/
function entityform_add_fieldset_field_group_formatter_info() {
  return array(
    'form' => array(
     'Newfieldset' => array(
        'label' => t('New Fieldset'),
     //   'description' => t('This fieldgroup renders the inner content in a fieldset with the titel as legend.'),
      //  'format_types' => array('open', 'collapsible', 'collapsed'),
        'instance_settings' => array('description' => '', 'classes' => '', 'page_header' => 3, 'page_counter' => 1, 'more_button' => 1),
        'default_formatter' => 'collapsible',
      ),
    ),
  );
  
} 


function entityform_add_fieldset_field_group_format_settings($group) {
  // Add a wrapper for extra settings to use by others.
    $form = array(
    'instance_settings' => array(
      '#tree' => TRUE,
      '#weight' => 2,
    ),
  );
   
  $field_group_types = field_group_formatter_info();
  $mode = $group->mode == 'form' ? 'form' : 'display';
  $formatter = $field_group_types[$mode]["Newfieldset"];
  /////redundant?
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
  
  switch ($group->format_type) {
    case 'Newfieldset':
	  $form['format-settings']['instance_settings']['more_button'] = array(
        '#title' => t('Move submit button to last multipage'),
        '#type' => 'button',
        '#options' => array(0 => t('No'), 1 => t('Yes')),
        '#default_value' => isset($group->format_settings['instance_settings']['more_button']) ? $group->format_settings['instance_settings']['more_button'] : $formatter['instance_settings']['more_button'],
        '#weight' => 3,
      );
	break;
	default:
  }
  return $form;  
  }
/*
function entityform_add_fieldset_field_group_pre_render(&$element, $group, &$form) {
  $add = array(
        '#type' => 'button',
        '#weight' => $group->weight,
      );
	  
  $add['#prefix'] = 'var item = "<span class="more-button"></span><input type="button" class="form-submit entityform-add-book" value="" />"';
        $add['#suffix'] = '$("body").find("#NewFieldsetTest").append(item);';
      }
  $element += $add;
}*/
function entityform_add_fieldset_field_group_pre_render_alter(&$element, $group, &$form) {
//add_element = array(
  $element += array(
    '#type' => 'fieldset',
    '#title' => check_plain(t($group->label)),
    '#collapsible' => $group->collapsible,
    '#collapsed' => $group->collapsed,
   // '#pre_render' => array(),
	'#prefix' => '<div id = "NewFieldsetTest" class="field-group-' . $group->format_type . '-wrapper ' . $group->classes . '">',
    '#suffix' => '<input type="button" class="form-submit entityform-add-book" value="AddAnother" /></div>',
//	'#theme_wrappers' => array(''),
	 
    '#attributes' => array('class' => explode(' ', $group->classes)),
    '#description' => $group->description,
  );

  $more_button = isset($group->format_settings['instance_settings']['more_button']) ? $group->format_settings['instance_settings']['more_button'] : 1;

  drupal_add_js(array(
    'field_group' => array(
      'addmore_button' => (bool) $more_button
	  )
  ), 'setting');
  
  //$group->format_settings['instance_settings']['more_button']['#type']= button;
   $element['#attached']['js'][] = drupal_get_path('module', 'entityform_add_fieldset') . '/entityform_add_fieldset.js';
  $element['#attached']['js'][] = 'misc/form.js';
  $element['#attached']['js'][] = 'misc/collapse.js';
}



 /*What needs to be done: create a module that lets users add more books to clean up current method
 * which uses another module, so as to simplify updating drupal
*the plan: 1. edit the entityform directly.- maybe put a wrapper around all the children within a fieldset
*   .... but the button is issue..
   
*2. create a new fieldgroup that duplicates contained fields

*/

?>
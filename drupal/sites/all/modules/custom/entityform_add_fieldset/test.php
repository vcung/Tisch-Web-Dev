
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
        'description' => t('This fieldgroup renders the inner content in a fieldset with the titel as legend.'),
        'format_types' => array('open', 'collapsible', 'collapsed'),
        'instance_settings' => array('classes' => '', 'page_header' => 3, 'page_counter' => 1, 'more_button' => 1),
       // 'default_formatter' => 'collapsible',
      ),
    ),
  );
  
} 


function entityform_add_fieldset_field_group_format_settings($group) {
  // Add a wrapper for extra settings to use by others.
  $field_group_types = field_group_formatter_info();
  $mode = $group->mode == 'form' ? 'form' : 'display';
  $formatter = $field_group_types[$mode][$group->format_type];
  switch ($group->format_type) {
    case 'Newfieldset':
	  $form['instance_settings']['more_button'] = array(
        '#title' => t('Move submit button to last multipage'),
        '#type' => 'button',
        '#options' => array(0 => t('No'), 1 => t('Yes')),
        '#default_value' => isset($group->format_settings['instance_settings']['more_button']) ? $group->format_settings['instance_settings']['more_button'] : $formatter['instance_settings']['more_button'],
        '#weight' => 3,
      );
	break;
  }	  
  }
  
function entityform_add_fieldset_field_group_pre_render_alter(&$element, $group, &$form) {
//add_element = array(
  $element += array(
    '#type' => 'fieldset',
    '#title' => check_plain(t($group->label)),
    '#collapsible' => $group->collapsible,
    '#collapsed' => $group->collapsed,
    '#pre_render' => array(),
	'#prefix' => '<div id = "NewFieldsetTest" class="field-group-' . $group->format_type . '-wrapper ' . $group->classes . '">',
    '#suffix' => '</div>',
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

}



 /*What needs to be done: create a module that lets users add more books to clean up current method
 * which uses another module, so as to simplify updating drupal
*the plan: 1. edit the entityform directly.- maybe put a wrapper around all the children within a fieldset
*   .... but the button is issue..
   
*2. create a new fieldgroup that duplicates contained fields

*/














/**
 * Creates a group formatted as addmore.
 * This function will never be callable from within field_group rendering. Other
 * modules using #type addmore will have the benefit of this processor.
 *
 * @param $element
 *   An associative array containing the properties and children of the
 *   fieldset.
 * @param $form_state
 *   The $form_state array for the form this horizontal tab widget belongs to.
 * @return
 *   The processed element.
 */
function form_process_addmore($element, &$form_state) {
  // Inject a new fieldset as child, so that form_process_fieldset() processes
  // this fieldset like any other fieldset.
  $element['group'] = array(
    '#type' => 'fieldset',
    '#theme_wrappers' => array(),
    '#parents' => $element['#parents'],
  );

  // The JavaScript stores the currently selected tab in this hidden
  // field so that the active control can be restored the next time the
  // form is rendered, e.g. on preview pages or when form validation
  // fails.
  $name = implode('__', $element['#parents']);
  if (isset($form_state['values'][$name . '__active_control'])) {
    $element['#default_tab'] = $form_state['values'][$name . '__active_control'];
  }
  $element[$name . '__active_control'] = array(
    '#type' => 'hidden',
    '#default_value' => $element['#default_control'],
    '#attributes' => array('class' => array('addmore-active-control')),
  );

  return $element;
}

/**
 * Returns HTML for an element's children fieldsets as addmore.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: An associative array containing the properties and children of the
 *     fieldset. Properties used: #children.
 *
 * @ingroup themeable
 */
function theme_addmore($variables) {
  $element = $variables['element'];
  // Add required JavaScript and Stylesheet.
  drupal_add_library('field_group', 'addmore');

  $output = '<h2 class="element-invisible">' . (!empty($element['#title']) ? $element['#title'] : t('AddMore')) . '</h2>';

  $output .= '<div class="addmore-panes">';
  $output .= $element['#children'];
  $output .= '</div>';

  return $output;
}

/**
 * Returns HTML for addmore pane.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: An associative array containing the properties and children of the
 *     fieldset. Properties used: #children.
 *
 * @ingroup themeable
 */
function theme_addmore_pane($variables) {

  $element = $variables['element'];
  $group = $variables['element']['#group_object'];
  $parent_group = $variables['element']['#parent_group_object'];

  static $addmores;
  if (!isset($addmores[$group->parent_name])) {
    $addmores = array($group->parent_name => 0);
  }
  $addmores[$parent_group->group_name]++;

  // Create a page title from the label.
  $page_header = isset($parent_group->format_settings['instance_settings']['page_header']) ? $parent_group->format_settings['instance_settings']['page_header'] : 3;
  switch ($page_header) {
    case 1:
      $title = $element['#title'];
      break;
    case 2:
      $title = t('Step %count of %total', array('%count' => $addmores[$parent_group->group_name], '%total' => count($parent_group->children)));
      break;
    case 3:
      $title = t('Step %count of %total !label', array('%count' => $addmores[$parent_group->group_name], '%total' => count($parent_group->children), '!label' => $element['#title']));
      break;
    case 0:
    default:
      $title = '';
      break;
  }

  element_set_attributes($element, array('id'));
  _form_set_class($element, array('form-wrapper'));

  $output = '<div' . drupal_attributes($element['#attributes']) . '>';
  if (!empty($element['#title'])) {
    // Always wrap fieldset legends in a SPAN for CSS positioning.
    $output .= '<h2 class="addmore-pane-title"><span>' . $title . '</span></h2>';
  }
  $output .= '<div class="fieldset-wrapper addmore-pane-wrapper">';
  if (!empty($element['#description'])) {
    $output .= '<div class="fieldset-description">' . $element['#description'] . '</div>';
  }
  $output .= $element['#children'];
  if (isset($element['#value'])) {
    $output .= $element['#value'];
  }

  // Add a page counter if needed.
  // counter array(0 => t('No'), 1 => t('Format 1 / 10'), 2 => t('The count number only'));
  $page_counter_format = isset($parent_group->format_settings['instance_settings']['page_counter']) ? $parent_group->format_settings['instance_settings']['page_counter'] : 1;
  $addmore_element['#page_counter_rendered'] = '';
  if ($page_counter_format == 1) {
    $output .= t('<span class="addmore-counter">%count / %total</span>', array('%count' => $addmores[$parent_group->group_name], '%total' => count($parent_group->children)));
  }
  elseif ($page_counter_format == 2) {
    $output .=  t('<span class="addmore-counter">%count</span>', array('%count' => $addmores[$parent_group->group_name]));
  }

  $output .= '</div>';
  $output .= "</div>\n";

  return $output;

}

/**
 * Get all groups.
 *
 * @param $entity_type
 *   The name of the entity.
 * @param $bundle
 *   The name of the bundle.
 * @param $view_mode
 *   The view mode.
 * @param $reset.
 *   Whether to reset the cache or not.
 */
function field_group_info_groups($entity_type = NULL, $bundle = NULL, $view_mode = NULL, $reset = FALSE) {
  st
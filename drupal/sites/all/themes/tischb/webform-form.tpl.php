<?php
/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 */
?>
<?php

  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
  print drupal_render_children($form);

//******************************************
//Adds place holders to text fields
function add_placeholder(&$form){
    foreach($form as $key => $val){
        if(substr($key,0,1) == '#' && $form[$key] == 'textfield'){
            $form['#attributes'] = array('placeholder' => t('some text'));
        }else if(is_array($form[$key])){
            add_placeholder($form[$key]);
        }
    }
}

//path to placeholder
drupal_add_js(drupal_get_path('theme', 'tischb'). '/js/placeholder.js');


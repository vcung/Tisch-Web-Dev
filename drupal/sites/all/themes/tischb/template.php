<?php

/**
 * Add body classes if certain regions have content.
 */

function tischb_preprocess_page(&$variables) {
  //kpr($variables);
}

function tischb_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
   

}



/**
 * Override or insert variables into the page template for HTML output.
 */
function tischb_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function tischb_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  //Get rid of default message on front page
  if (drupal_is_front_page()) {
	$variables['title']="";
	unset($variables['page']['content']['system_main']['default_message']);
	}
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function tischb_preprocess_maintenance_page(&$variables) {
  if (!$variables['db_is_active']) {
    unset($variables['site_name']);
  }
  drupal_add_css(drupal_get_path('theme', 'tischb') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function tischb_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function tischb_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Override or insert variables into the block template.
 */
function tischb_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
  if ((drupal_is_front_page()) &&($variables['block']->region == 'content')) {
	$variables['title_attributes_array']['class'][] = 'element-invisible';
	}
}
/**
 * Implements theme_menu_tree().
 */
function tischb_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function tischb_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

  return $output;
}





/*
* Turning nice_menus into a table tree structure
*/
/*
function tischb_nice_menu($id, $menu_name, $mlid, $direction = 'right', $menu = NULL) {
  $output = array();
  if ($menu_tree = theme('nice_menu_tree', $menu_name, $mlid, $menu)) {
    if ($menu_tree['content']) {
      $output['content'] = '<table-width="100%" class="site-menu"><tr>'.$menu_tree['content'] .'</tr></table>'."\n";
      $output['subject'] = $menu_tree['subject'];
    }
  }
  return $output;
}

/*
function tischb_nice_menu_build($menu) {
  $output = '';
  global $is_child;
  foreach ($menu as $menu_item) {
    $mlid = $menu_item['link']['mlid'];
    //check to see if it is a visible menu item.
    if ($menu_item['link']['hidden'] == 0) {
      //Build class name based on menu path--give each menu item individual style
      $clean_path = str_replace(array('http://', '<', '>', '&', '=', '?', ':'), '', $menu_item['link']['href']);
      $clean_path = str_replace('/', '-', $clean_path);
      $current_node = str_replace('node-', '', $clean_path);
      $path_class = 'menu-path'. $clean_path;
      if($current_node == $GLOBALS['active-node']) {
	$path_class.= ' active-content';
      }
      //If it has children build a nice little tree under it
      if ((!empty($menu_item['link']['has_children'])) && (!empty($menu_item['below']))) {
	$is_child = true;
	//keep passing children into the function til we get them all
	$children = theme('nice_menu_build', $menu_item['below']);
	//set the class to parent only if children are displayed
	$parent_class = $children ? 'menuparent ' : '';
	if (isset($parent_class)):
	  $output .= '<td id="menu-'. $mlid .'" class="'. $parent_class . $path_class .'">'. theme('menu_item_link', $memu_item['link']);
	else:
	  $output .= '<li id="menu-' .$mlid /'" class="'. $patent_class . $path_class .'">' . theme('menu_item_link', $menu_item['link']);
	endif;
	//build the child ul only if there is a child menu
	if ($children) {
	  $output .= '<ul>';
	  $output .= $children;
	  $output .= "</ul>\n";
	}
	if (isset($parent_class)):
	  $output .= "</td>";
	  //adds some seperator values after each td
	  $output .= '<td><span class="sep1></span></td>'."\n";
	else:
	  $output .= "</li>\n";
	endif;
      }
      else {
	if ($is_child == false) {
	  $output .= '<td id="menu-'. $mlid .'" class ="'. $path_class .'">'. theme('menu_item_link', $menu_item['link']) .'</td>'."\n";
	 //adds some extra seperators after each td
	  $output .= '<td><span class ="sep1"></span></td>'."\n";
	}
	else {
	  $output .= '<li id="menu-'. $mlid.'" class="'. $path_class .'">'. theme('menu_item_link', $menu_item['link']) .'</li>'."\n";
	}
      }
    }
  }
  $is_child = false;
  return $output;

}
*/

<?php
/**
 * @file
 * basic_content_content_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function basic_content_content_type_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function basic_content_content_type_node_info() {
  $items = array(
    'basic_content' => array(
      'name' => t('Basic content'),
      'base' => 'node_content',
      'description' => t('Use <em>basic content</em> for content that doesn\'t fit into the other content types - it\'s not obviously a piece of equipment, a workshop (which goes under "event"), or something that fits under a "how to" kind of page. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

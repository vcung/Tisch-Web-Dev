<?php
/**
 * @file
 * e_resource_content_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function e_resource_content_type_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function e_resource_content_type_node_info() {
  $items = array(
    'e_resource' => array(
      'name' => t('E-Resource'),
      'base' => 'node_content',
      'description' => t('Used for online resources: databases, featured ebooks, ebook collections, online tutorials. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

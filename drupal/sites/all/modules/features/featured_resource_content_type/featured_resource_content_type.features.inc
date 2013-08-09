<?php
/**
 * @file
 * featured_resource_content_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function featured_resource_content_type_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function featured_resource_content_type_node_info() {
  $items = array(
    'featured_resource' => array(
      'name' => t('Featured Resource'),
      'base' => 'node_content',
      'description' => t('Used for a resource that does not live online (a physical book, or a research tip) but that is to be displayed on web pages to promote it\'s use or to spread interesting/helpful information about the library or research in general. Curated. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

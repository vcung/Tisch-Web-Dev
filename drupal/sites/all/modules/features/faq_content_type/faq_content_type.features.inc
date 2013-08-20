<?php
/**
 * @file
 * faq_content_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function faq_content_type_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function faq_content_type_node_info() {
  $items = array(
    'faq' => array(
      'name' => t('FAQ'),
      'base' => 'node_content',
      'description' => t('Used for answering "How do I..." or "Where is..." questions on the website. These help users interact with the website, library, and in performing basic research tasks. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

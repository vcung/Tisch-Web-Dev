<?php
/**
 * @file
 * event_content_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function event_content_type_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function event_content_type_node_info() {
  $items = array(
    'event' => array(
      'name' => t('Event'),
      'base' => 'node_content',
      'description' => t('A workshop, class, author talk, or any other event the library is hosting at Tisch for students or the public. Events will be listed in the event calendar.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

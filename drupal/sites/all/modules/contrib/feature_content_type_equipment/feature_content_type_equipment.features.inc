<?php
/**
 * @file
 * feature_content_type_equipment.features.inc
 */

/**
 * Implements hook_node_info().
 */
function feature_content_type_equipment_node_info() {
  $items = array(
    'equipment' => array(
      'name' => t('Equipment'),
      'base' => 'node_content',
      'description' => t('Computers, printers, scanners, copiers and software available for use at the library.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

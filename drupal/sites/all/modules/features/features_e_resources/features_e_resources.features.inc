<?php
/**
 * @file
 * features_e_resources.features.inc
 */

/**
 * Implements hook_node_info().
 */
function features_e_resources_node_info() {
  $items = array(
    'e_resource' => array(
      'name' => t('E-resource'),
      'base' => 'node_content',
      'description' => t('Database, e-book and e-journal collections'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

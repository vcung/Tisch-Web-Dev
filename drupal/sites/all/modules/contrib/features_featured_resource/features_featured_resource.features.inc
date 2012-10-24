<?php
/**
 * @file
 * features_featured_resource.features.inc
 */

/**
 * Implements hook_node_info().
 */
function features_featured_resource_node_info() {
  $items = array(
    'featured_resource' => array(
      'name' => t('Featured Resource'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Resource name'),
      'help' => '',
    ),
  );
  return $items;
}

<?php
/**
 * @file
 * features_libguides.features.inc
 */

/**
 * Implements hook_node_info().
 */
function features_libguides_node_info() {
  $items = array(
    'libguide' => array(
      'name' => t('LibGuide'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

<?php
/**
 * @file
 * staff_content_type.features.inc
 */

/**
 * Implements hook_node_info().
 */
function staff_content_type_node_info() {
  $items = array(
    'tisch_staff' => array(
      'name' => t('Tisch staff'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Tisch Staff'),
      'help' => '',
    ),
  );
  return $items;
}

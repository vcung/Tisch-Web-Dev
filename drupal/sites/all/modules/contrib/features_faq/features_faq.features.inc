<?php
/**
 * @file
 * features_faq.features.inc
 */

/**
 * Implements hook_node_info().
 */
function features_faq_node_info() {
  $items = array(
    'faq' => array(
      'name' => t('FAQ'),
      'base' => 'node_content',
      'description' => t('Pages for questions regarding research and library services'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

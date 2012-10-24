<?php
/**
 * @file
 * features_news_or_event.features.inc
 */

/**
 * Implements hook_node_info().
 */
function features_news_or_event_node_info() {
  $items = array(
    'news_or_event' => array(
      'name' => t('News or Event'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

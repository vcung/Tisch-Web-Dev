<?php
/**
 * @file
 * features_student_job_content_type.features.inc
 */

/**
 * Implements hook_node_info().
 */
function features_student_job_content_type_node_info() {
  $items = array(
    'student_job' => array(
      'name' => t('Student Job'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

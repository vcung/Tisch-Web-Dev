<?php
/**
 * @file
 * event_content_type.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function event_content_type_taxonomy_default_vocabularies() {
  return array(
    'audience' => array(
      'name' => 'Audience',
      'machine_name' => 'audience',
      'description' => 'Vocabulary used to target different types of users',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'department' => array(
      'name' => 'Department',
      'machine_name' => 'department',
      'description' => 'List of departments',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'event_type' => array(
      'name' => 'Event type',
      'machine_name' => 'event_type',
      'description' => 'Describes events to differentiate classes & workshops for more public events like poetry readings and author talk',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}

<?php
/**
 * @file
 * top_resource_box.box.inc
 */

/**
 * Implements hook_default_box().
 */
function top_resource_box_default_box() {
  $export = array();

  $box = new stdClass();
  $box->disabled = FALSE; /* Edit this to true to make a default box disabled initially */
  $box->api_version = 1;
  $box->delta = 'top_resources';
  $box->plugin_key = 'simple';
  $box->title = 'Top Resources';
  $box->description = 'Top Resources Box';
  $box->options = array(
    'body' => array(
      'value' => 'Resources

    Databases A-Z
    Journals & Newspapers A-Z
    E-books

Services

    Course Reserves
    Research Guides by Subject
    Interlibrary Loan (IILiad)

',
      'format' => 'filtered_html',
    ),
    'additional_classes' => 'lowerMainContent',
  );
  $export['top_resources'] = $box;

  return $export;
}

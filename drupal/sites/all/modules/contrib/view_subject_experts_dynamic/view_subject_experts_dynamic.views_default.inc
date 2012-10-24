<?php
/**
 * @file
 * view_subject_experts_dynamic.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function view_subject_experts_dynamic_views_default_views() {
  $export = array();

  $view = new view;
  $view->name = 'subject_experts';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'subject experts - dynamic';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Experts in %1';
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['use_more_text'] = 'more experts';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'field_department',
      'rendered' => 1,
      'rendered_strip' => 0,
    ),
  );
  $handler->display->display_options['style_options']['row_class'] = 'expertRow';
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['hide_empty'] = 0;
  $handler->display->display_options['row_options']['default_field_elements'] = 1;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Field: Content: Image */
  $handler->display->display_options['fields']['field_staff_image']['id'] = 'field_staff_image';
  $handler->display->display_options['fields']['field_staff_image']['table'] = 'field_data_field_staff_image';
  $handler->display->display_options['fields']['field_staff_image']['field'] = 'field_staff_image';
  $handler->display->display_options['fields']['field_staff_image']['label'] = '';
  $handler->display->display_options['fields']['field_staff_image']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_staff_image']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_staff_image']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_staff_image']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_staff_image']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_staff_image']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_staff_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_staff_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_staff_image']['field_api_classes'] = 0;
  /* Field: Content: Title */
  $handler->display->display_options['fields']['field_staff_title']['id'] = 'field_staff_title';
  $handler->display->display_options['fields']['field_staff_title']['table'] = 'field_data_field_staff_title';
  $handler->display->display_options['fields']['field_staff_title']['field'] = 'field_staff_title';
  $handler->display->display_options['fields']['field_staff_title']['label'] = '';
  $handler->display->display_options['fields']['field_staff_title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_staff_title']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_staff_title']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_staff_title']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_staff_title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_staff_title']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_staff_title']['field_api_classes'] = 0;
  /* Field: Content: Email */
  $handler->display->display_options['fields']['field_email']['id'] = 'field_email';
  $handler->display->display_options['fields']['field_email']['table'] = 'field_data_field_email';
  $handler->display->display_options['fields']['field_email']['field'] = 'field_email';
  $handler->display->display_options['fields']['field_email']['label'] = '';
  $handler->display->display_options['fields']['field_email']['alter']['alter_text'] = 1;
  $handler->display->display_options['fields']['field_email']['alter']['text'] = '<a href="mailto:[field_email]">[field_email]</a>';
  $handler->display->display_options['fields']['field_email']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['path'] = '[field_email]';
  $handler->display->display_options['fields']['field_email']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_email']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_email']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_email']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_email']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_email']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_email']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_email']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_email']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_email']['field_api_classes'] = 0;
  /* Field: Content: Phone number */
  $handler->display->display_options['fields']['field_phone_number']['id'] = 'field_phone_number';
  $handler->display->display_options['fields']['field_phone_number']['table'] = 'field_data_field_phone_number';
  $handler->display->display_options['fields']['field_phone_number']['field'] = 'field_phone_number';
  $handler->display->display_options['fields']['field_phone_number']['label'] = '';
  $handler->display->display_options['fields']['field_phone_number']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_phone_number']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_phone_number']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_phone_number']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_phone_number']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_phone_number']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_phone_number']['field_api_classes'] = 0;
  /* Field: Content: Subject */
  $handler->display->display_options['fields']['field_subject_expert']['id'] = 'field_subject_expert';
  $handler->display->display_options['fields']['field_subject_expert']['table'] = 'field_data_field_subject_expert';
  $handler->display->display_options['fields']['field_subject_expert']['field'] = 'field_subject_expert';
  $handler->display->display_options['fields']['field_subject_expert']['label'] = 'Other areas of expertise';
  $handler->display->display_options['fields']['field_subject_expert']['alter']['alter_text'] = 1;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['text'] = '<a href="[field_subject_expert-tid]">[field_subject_expert]</a>';
  $handler->display->display_options['fields']['field_subject_expert']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['element_label_colon'] = 1;
  $handler->display->display_options['fields']['field_subject_expert']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_subject_expert']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_subject_expert']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_subject_expert']['group_rows'] = 1;
  $handler->display->display_options['fields']['field_subject_expert']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_subject_expert']['delta_reversed'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['delta_first_last'] = 0;
  $handler->display->display_options['fields']['field_subject_expert']['field_api_classes'] = 0;
  /* Field: Content: Department */
  $handler->display->display_options['fields']['field_department']['id'] = 'field_department';
  $handler->display->display_options['fields']['field_department']['table'] = 'field_data_field_department';
  $handler->display->display_options['fields']['field_department']['field'] = 'field_department';
  $handler->display->display_options['fields']['field_department']['label'] = '';
  $handler->display->display_options['fields']['field_department']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_department']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['external'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['nl2br'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields']['field_department']['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields']['field_department']['alter']['more_link'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['field_department']['alter']['html'] = 0;
  $handler->display->display_options['fields']['field_department']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_department']['element_default_classes'] = 1;
  $handler->display->display_options['fields']['field_department']['hide_empty'] = 0;
  $handler->display->display_options['fields']['field_department']['empty_zero'] = 0;
  $handler->display->display_options['fields']['field_department']['hide_alter_empty'] = 1;
  $handler->display->display_options['fields']['field_department']['field_api_classes'] = 0;
  /* Sort criterion: Content: Department (field_department) */
  $handler->display->display_options['sorts']['field_department_tid']['id'] = 'field_department_tid';
  $handler->display->display_options['sorts']['field_department_tid']['table'] = 'field_data_field_department';
  $handler->display->display_options['sorts']['field_department_tid']['field'] = 'field_department_tid';
  /* Sort criterion: Content: Last name (field_last_name) */
  $handler->display->display_options['sorts']['field_last_name_value']['id'] = 'field_last_name_value';
  $handler->display->display_options['sorts']['field_last_name_value']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['sorts']['field_last_name_value']['field'] = 'field_last_name_value';
  /* Contextual filter: Content: Has taxonomy term ID */
  $handler->display->display_options['arguments']['tid']['id'] = 'tid';
  $handler->display->display_options['arguments']['tid']['table'] = 'taxonomy_index';
  $handler->display->display_options['arguments']['tid']['field'] = 'tid';
  $handler->display->display_options['arguments']['tid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['tid']['default_argument_type'] = 'taxonomy_tid';
  $handler->display->display_options['arguments']['tid']['default_argument_options']['term_page'] = 0;
  $handler->display->display_options['arguments']['tid']['default_argument_options']['node'] = 1;
  $handler->display->display_options['arguments']['tid']['default_argument_options']['limit'] = 0;
  $handler->display->display_options['arguments']['tid']['default_argument_options']['vocabularies'] = array(
    'specialty' => 'specialty',
  );
  $handler->display->display_options['arguments']['tid']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['tid']['break_phrase'] = 0;
  $handler->display->display_options['arguments']['tid']['add_table'] = 0;
  $handler->display->display_options['arguments']['tid']['require_value'] = 0;
  $handler->display->display_options['arguments']['tid']['reduce_duplicates'] = 0;
  $handler->display->display_options['arguments']['tid']['set_breadcrumb'] = 0;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'tisch_staff' => 'tisch_staff',
  );
  /* Filter criterion: Content: Display as Expert? (field_expert_) */
  $handler->display->display_options['filters']['field_expert__value']['id'] = 'field_expert__value';
  $handler->display->display_options['filters']['field_expert__value']['table'] = 'field_data_field_expert_';
  $handler->display->display_options['filters']['field_expert__value']['field'] = 'field_expert__value';
  $handler->display->display_options['filters']['field_expert__value']['value'] = array(
    1 => '1',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'subject-experts';

  /* Display: subject experts dynamic block */
  $handler = $view->new_display('block', 'subject experts dynamic block', 'block_1');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $export['subject_experts'] = $view;

  return $export;
}

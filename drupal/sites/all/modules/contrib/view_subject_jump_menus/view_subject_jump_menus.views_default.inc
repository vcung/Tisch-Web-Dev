<?php
/**
 * @file
 * view_subject_jump_menus.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function view_subject_jump_menus_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'subject_';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'taxonomy_term_data';
  $view->human_name = 'Subject jump menus';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Subject guides';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'jump_menu';
  $handler->display->display_options['style_options']['path'] = 'field_libguide';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Taxonomy term: LibGuide */
  $handler->display->display_options['fields']['field_libguide']['id'] = 'field_libguide';
  $handler->display->display_options['fields']['field_libguide']['table'] = 'field_data_field_libguide';
  $handler->display->display_options['fields']['field_libguide']['field'] = 'field_libguide';
  $handler->display->display_options['fields']['field_libguide']['label'] = '';
  $handler->display->display_options['fields']['field_libguide']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_libguide']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_libguide']['click_sort_column'] = 'url';
  $handler->display->display_options['fields']['field_libguide']['type'] = 'link_plain';
  $handler->display->display_options['fields']['field_libguide']['delta_offset'] = '0';
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['text'] = '<a href=[field_libguide]>[name]</a>';
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  /* Sort criterion: Taxonomy term: Name */
  $handler->display->display_options['sorts']['name']['id'] = 'name';
  $handler->display->display_options['sorts']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['sorts']['name']['field'] = 'name';
  /* Filter criterion: Taxonomy term: Vocabulary */
  $handler->display->display_options['filters']['vid']['id'] = 'vid';
  $handler->display->display_options['filters']['vid']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['filters']['vid']['field'] = 'vid';
  $handler->display->display_options['filters']['vid']['value'] = array(
    5 => '5',
  );

  /* Display: Block libguides jump menu */
  $handler = $view->new_display('block', 'Block libguides jump menu', 'block');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;

  /* Display: Find an expert by subject */
  $handler = $view->new_display('block', 'Find an expert by subject', 'block_1');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Find an expert by subject';
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'jump_menu';
  $handler->display->display_options['style_options']['path'] = 'nothing';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Taxonomy term: Term ID */
  $handler->display->display_options['fields']['tid']['id'] = 'tid';
  $handler->display->display_options['fields']['tid']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['tid']['field'] = 'tid';
  $handler->display->display_options['fields']['tid']['label'] = '';
  $handler->display->display_options['fields']['tid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['tid']['element_label_colon'] = FALSE;
  /* Field: Taxonomy term: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'taxonomy_term_data';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['exclude'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['text'] = '<a href="subject-experts/[tid]">[name]</a>';
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['name']['element_default_classes'] = FALSE;
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = '';
  $handler->display->display_options['fields']['nothing']['alter']['text'] = '<a href="subject-experts/[tid]">[name]</a>';
  $handler->display->display_options['fields']['nothing']['element_label_colon'] = FALSE;
  $export['subject_'] = $view;

  return $export;
}

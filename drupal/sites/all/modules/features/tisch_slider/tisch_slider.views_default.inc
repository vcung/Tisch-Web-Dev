<?php
/**
 * @file
 * tisch_slider.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function tisch_slider_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'new_arrival_sliders';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'bean';
  $view->human_name = 'New Arrival sliders';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Recent Arrivals';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '6';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'flexslider';
  $handler->display->display_options['style_options']['optionset'] = 'flexslider_default_basic_carousel';
  $handler->display->display_options['style_options']['id'] = 'newAvFlex';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Block: Catalog link */
  $handler->display->display_options['fields']['field_cat_link']['id'] = 'field_cat_link';
  $handler->display->display_options['fields']['field_cat_link']['table'] = 'field_data_field_cat_link';
  $handler->display->display_options['fields']['field_cat_link']['field'] = 'field_cat_link';
  $handler->display->display_options['fields']['field_cat_link']['label'] = '';
  $handler->display->display_options['fields']['field_cat_link']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_cat_link']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_cat_link']['click_sort_column'] = 'url';
  /* Field: Field: Image */
  $handler->display->display_options['fields']['field_image']['id'] = 'field_image';
  $handler->display->display_options['fields']['field_image']['table'] = 'field_data_field_image';
  $handler->display->display_options['fields']['field_image']['field'] = 'field_image';
  $handler->display->display_options['fields']['field_image']['label'] = '';
  $handler->display->display_options['fields']['field_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_image']['type'] = 'picture';
  $handler->display->display_options['fields']['field_image']['settings'] = array(
    'picture_group' => 'recent_arrival',
    'fallback_image_style' => 'recent_arrival_rbreakpoints_theme_selbert_mobile_1x',
    'image_link' => '',
  );
  /* Field: Field: Resource type */
  $handler->display->display_options['fields']['field_resource_type']['id'] = 'field_resource_type';
  $handler->display->display_options['fields']['field_resource_type']['table'] = 'field_data_field_resource_type';
  $handler->display->display_options['fields']['field_resource_type']['field'] = 'field_resource_type';
  $handler->display->display_options['fields']['field_resource_type']['label'] = '';
  $handler->display->display_options['fields']['field_resource_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_resource_type']['type'] = 'taxonomy_term_reference_plain';
  /* Field: Block: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'bean';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  /* Filter criterion: Block: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'bean';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'new_arrival' => 'new_arrival',
  );

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['hide_admin_links'] = FALSE;
  $export['new_arrival_sliders'] = $view;

  return $export;
}

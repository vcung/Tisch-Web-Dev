<?php
/**
 * @file
 * top_resource_box.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function top_resource_box_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "boxes" && $api == "box") {
    return array("version" => "1");
  }
}

<?php
/**
 * @file
 * utility_menu.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function utility_menu_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: menu-utility.
  $menus['menu-utility'] = array(
    'menu_name' => 'menu-utility',
    'title' => 'Utility',
    'description' => 'Menu featured in header of each page (Ask a Librarian, "I\'m a....") not to be mistaken with main menu.',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Menu featured in header of each page (Ask a Librarian, "I\'m a....") not to be mistaken with main menu.');
  t('Utility');


  return $menus;
}

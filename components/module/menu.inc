<?php declare(strict_types=1);

/**
 * @file keeps menu related hooks from menu.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\Module\Menu\MenuComponent;

/**
 * Implements hook_menu_insert().
 *
 * @param array $menu
 */
function xdruple_menu_insert($menu) {
  _xdruple_application_menu_component()->menuInsert($menu);
}

/**
 * Implements hook_menu_update().
 *
 * @param array $menu
 */
function xdruple_menu_update($menu) {
  _xdruple_application_menu_component()->menuUpdate($menu);
}

/**
 * Implements hook_menu_delete().
 *
 * @param array $menu
 */
function xdruple_menu_delete($menu) {
  _xdruple_application_menu_component()->menuDelete($menu);
}

function _xdruple_application_menu_component(): MenuComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(MenuComponent::NAME);
  /** @var MenuComponent $component */
  return $component;
}

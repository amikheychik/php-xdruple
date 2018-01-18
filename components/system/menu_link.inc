<?php declare(strict_types=1);

/**
 * @file keeps menu links related hooks from menu.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\System\MenuLink\MenuLinkComponent;

/**
 * Implements hook_menu_link_insert().
 *
 * @param array $link
 */
function xdruple_menu_link_insert($link) {
  _xdruple_application_menu_link_component()->menuLinkInsert($link);
}

/**
 * Implements hook_menu_link_update().
 *
 * @param array $link
 */
function xdruple_menu_link_update($link) {
  _xdruple_application_menu_link_component()->menuLinkUpdate($link);
}

/**
 * Implements hook_menu_link_delete().
 *
 * @param array $link
 */
function xdruple_menu_link_delete($link) {
  _xdruple_application_menu_link_component()->menuLinkDelete($link);
}

/**
 * Implements hook_menu_link_alter().
 *
 * @param array $item
 */
function xdruple_menu_link_alter(&$item) {
  _xdruple_application_menu_link_component()->menuLinkAlter($item);
}

function _xdruple_application_menu_link_component(): MenuLinkComponent {
  /** @var MenuLinkComponent $component */
  $component = xdruple_application()->component(MenuLinkComponent::NAME);
  return $component;
}

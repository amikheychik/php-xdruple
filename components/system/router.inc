<?php declare(strict_types=1);

/**
 * @file keeps menu-related hooks from system.api.php implementations
 */

use Xtuple\Xdruple\Application\Component\Component\System\Router\RouterComponent;

/**
 * Implements hook_menu().
 *
 * @return array
 */
function xdruple_menu() {
  return _xdruple_application_router_component()->menu();
}

/**
 * Implements hook_menu_alter().
 *
 * @param array $items
 */
function xdruple_menu_alter(&$items) {
  _xdruple_application_router_component()->menuAlter($items);
}

/**
 * Implements hook_menu_breadcrumb_alter().
 *
 * @param array $active_trail
 * @param array $item
 */
function xdruple_menu_breadcrumb_alter(&$active_trail, $item) {
  _xdruple_application_router_component()->menuBreadcrumbAlter($active_trail, $item);
}

/**
 * Implements hook_menu_contextual_links_alter().
 *
 * @param array  $links
 * @param array  $router_item
 * @param string $root_path
 */
function xdruple_menu_contextual_links_alter(&$links, $router_item, $root_path) {
  _xdruple_application_router_component()->menuContextualLinksAlter($links, $router_item, $root_path);
}

/**
 * Implements hook_menu_local_tasks_alter().
 *
 * @param array  $data
 * @param array  $router_item
 * @param string $root_path
 */
function xdruple_menu_local_tasks_alter(&$data, $router_item, $root_path) {
  _xdruple_application_router_component()->menuLocalTasksAlter($data, $router_item, $root_path);
}

/**
 * Implements hook_menu_site_status_alter().
 *
 * @param int    $menu_site_status
 * @param string $path
 */
function xdruple_menu_site_status_alter(&$menu_site_status, $path) {
  _xdruple_application_router_component()->menuSiteStatusAlter($menu_site_status, $path);
}

/**
 * Implements hook_menu_get_item_alter().
 *
 * @param array  $router_item
 * @param string $path
 * @param array  $original_map
 */
function xdruple_menu_get_item_alter(&$router_item, $path, $original_map) {
  _xdruple_application_router_component()->menuGetItemAlter($router_item, $path, $original_map);
}

/**
 * Implements hook_drupal_goto_alter().
 *
 * @param string $path
 * @param array  $options
 * @param int    $http_response_code
 */
function xdruple_drupal_goto_alter(&$path, &$options, &$http_response_code) {
  _xdruple_application_router_component()->drupalGotoAlter($path, $options, $http_response_code);
}

/**
 * Implements hook_menu() 'load callback'.
 *
 * @param string $id
 * @param string $path
 * @param array  $map
 * @param int    $index
 * @param array  $loaders
 * @param array  $args
 *
 * @return mixed|false
 */
function xdruple_menu_load($id, $path, $map, $index, $loaders, ...$args) {
  return _xdruple_application_router_component()->menuLoad($id, $path, $map, $index, $loaders, $args);
}

/**
 * Implements hook_menu() 'access callback'.
 *
 * @param string $path
 * @param array  $args
 *
 * @return bool
 */
function xdruple_menu_access($path, ...$args) {
  return _xdruple_application_router_component()->menuAccess($path, $args);
}

/**
 * Implements hook_menu() 'title callback'.
 *
 * @param string $path
 * @param array  $args
 *
 * @return string
 */
function xdruple_menu_title($path, ...$args) {
  return _xdruple_application_router_component()->menuTitle($path, $args);
}

/**
 * Implements hook_menu() 'page callback'.
 *
 * @param string $path
 * @param array  $args
 *
 * @return array|int
 */
function xdruple_menu_page($path, ...$args) {
  return _xdruple_application_router_component()->menuPage($path, $args);
}

/**
 * Implements hook_menu() 'theme callback'.
 *
 * @param string $path
 * @param array  $args
 *
 * @return string
 */
function xdruple_menu_theme($path, ...$args) {
  return _xdruple_application_router_component()->menuTheme($path, $args);
}

/**
 * Implements hook_menu() 'delivery callback'.
 *
 * @param array|int $data
 */
function xdruple_menu_delivery($data) {
  _xdruple_application_router_component()->menuDelivery($data);
}

function _xdruple_application_router_component(): RouterComponent {
  /** @var RouterComponent $component */
  $component = xdruple_application()->component(RouterComponent::NAME);
  return $component;
}

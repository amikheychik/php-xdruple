<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\System\AdminPaths\AdminPathsComponent;

/**
 * Implements hook_admin_paths().
 *
 * @return array
 */
function xdruple_admin_paths() {
  return _xdruple_application_admin_paths_component()->adminPaths();
}

/**
 * Implements hook_admin_paths_alter().
 *
 * @param array $paths
 */
function xdruple_admin_paths_alter(&$paths) {
  _xdruple_application_admin_paths_component()->adminPathsAlter($paths);
}

function _xdruple_application_admin_paths_component(): AdminPathsComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(AdminPathsComponent::NAME);
  /** @var AdminPathsComponent $component */
  return $component;
}

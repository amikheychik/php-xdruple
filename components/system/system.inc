<?php declare(strict_types=1);

/**
 * @file keeps system related hooks from system.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\System\System\SystemComponent;

/**
 * Implements hook_system_info_alter().
 *
 * @param array    $info
 * @param stdClass $file
 * @param string   $type
 */
function xdruple_system_info_alter(&$info, $file, $type) {
  _xdruple_application_system_component()->systemInfoAlter($info, $file, $type);
}

/**
 * Implements hook_system_theme_info().
 *
 * @return string[]
 */
function xdruple_system_theme_info() {
  return _xdruple_application_system_component()->systemThemeInfo();
}

/**
 * Implements hook_registry_files_alter().
 *
 * @param array      $files
 * @param stdClass[] $modules
 */
function xdruple_registry_files_alter(&$files, $modules) {
  _xdruple_application_system_component()->registryFilesAlter($files, $modules);
}

function _xdruple_application_system_component(): SystemComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(SystemComponent::NAME);
  /** @var SystemComponent $component */
  return $component;
}

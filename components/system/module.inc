<?php declare(strict_types=1);

/**
 * @file keeps implementations for hook_module_implements_alter() and hook_modules_EVENT() from system.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\System\Module\ModuleComponent;

/**
 * Implements hook_module_implements_alter().
 *
 * @param string[] $implementations
 * @param string   $hook
 */
function xdruple_module_implements_alter(&$implementations, $hook) {
  _xdruple_application_module_component()->moduleImplementsAlter($implementations, $hook);
}

/**
 * Implements hook_modules_installed().
 *
 * @param string[] $modules
 */
function xdruple_modules_installed($modules) {
  _xdruple_application_module_component()->modulesInstalled($modules);
}

/**
 * Implements hook_modules_enabled().
 *
 * @param string[] $modules
 */
function xdruple_modules_enabled($modules) {
  _xdruple_application_module_component()->modulesEnabled($modules);
}

/**
 * Implements hook_modules_disabled().
 *
 * @param string[] $modules
 */
function xdruple_modules_disabled($modules) {
  _xdruple_application_module_component()->modulesDisabled($modules);
}

/**
 * Implements hook_modules_uninstalled().
 *
 * @param string[] $modules
 */
function xdruple_modules_uninstalled($modules) {
  _xdruple_application_module_component()->modulesUninstalled($modules);
}

function _xdruple_application_module_component(): ModuleComponent {
  /** @var ModuleComponent $component */
  $component = xdruple_application()->component(ModuleComponent::NAME);
  return $component;
}

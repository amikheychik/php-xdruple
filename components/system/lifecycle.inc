<?php declare(strict_types=1);

/**
 * @file keeps Drupal lifecycle hooks implementations.
 */

use Xtuple\Xdruple\Application\Component\Component\System\Lifecycle\LifecycleComponent;

/**
 * Implements hook_boot().
 */
function xdruple_boot() {
  _xdruple_application_lifecycle_component()->boot();
}

/**
 * Implements hook_init().
 */
function xdruple_init() {
  _xdruple_application_lifecycle_component()->init();
}

/**
 * Implements hook_exit().
 *
 * @param string $destination
 */
function xdruple_exit($destination = null) {
  _xdruple_application_lifecycle_component()->exit($destination);
}

function _xdruple_application_lifecycle_component(): LifecycleComponent {
  /** @var LifecycleComponent $component */
  $component = xdruple_application()->component(LifecycleComponent::NAME);
  return $component;
}

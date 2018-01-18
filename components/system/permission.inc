<?php declare(strict_types=1);

/**
 * @file keeps Permission API hooks implementations
 * @see  https://api.drupal.org/api/drupal/modules!system!system.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\System\Permission\PermissionComponent;

/**
 * Implements hook_permission().
 *
 * @return array
 */
function xdruple_permission() {
  return _xdruple_application_permission_component()->permission();
}

function _xdruple_application_permission_component(): PermissionComponent {
  /** @var PermissionComponent $component */
  $component = xdruple_application()->component(PermissionComponent::NAME);
  return $component;
}

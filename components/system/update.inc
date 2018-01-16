<?php declare(strict_types=1);

/**
 * @file keeps Drupal update hooks implementations.
 */

use Xtuple\Xdruple\Application\Component\Component\System\Update\UpdateComponent;

/**
 * Implements hook_update_last_removed().
 *
 * @return int
 */
function xdruple_update_last_removed() {
  return _xdruple_application_update_component()->updateLastRemoved();
}

/**
 * Implements hook_update_dependencies().
 *
 * @return array
 */
function xdruple_update_dependencies() {
  return _xdruple_application_update_component()->updateDependencies();
}

function _xdruple_application_update_component(): UpdateComponent {
  /** @var UpdateComponent $component */
  $component = xdruple_application()->component(UpdateComponent::NAME);
  return $component;
}

<?php declare(strict_types=1);

/**
 * @file keeps Requirements API hooks implementations
 * @see  https://api.drupal.org/api/drupal/modules!system!system.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\System\Requirements\RequirementsComponent;

/**
 * Implements hook_requirements().
 *
 * @param string $phase
 *
 * @return array
 */
function xdruple_requirements($phase) {
  return _xdruple_application_requirements_component()->requirements($phase);
}

function _xdruple_application_requirements_component(): RequirementsComponent {
  /** @var RequirementsComponent $component */
  $component = xdruple_application()->component(RequirementsComponent::NAME);
  return $component;
}

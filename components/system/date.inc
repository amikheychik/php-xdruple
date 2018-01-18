<?php declare(strict_types=1);

/**
 * @file keeps (System) Date API hooks implementations
 * @see  https://api.drupal.org/api/drupal/modules!system!system.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\System\Date\DateComponent;

/**
 * Implements hook_date_formats().
 *
 * @return array
 */
function xdruple_date_formats() {
  return _xdruple_application_date_component()->dateFormats();
}

/**
 * Implements hook_date_formats_alter().
 *
 * @param array $formats
 */
function xdruple_date_formats_alter(&$formats) {
  _xdruple_application_date_component()->dateFormatsAlter($formats);
}

/**
 * Implements hook_date_format_types().
 *
 * @return array
 */
function xdruple_date_format_types() {
  return _xdruple_application_date_component()->dateFormatTypes();
}

/**
 * Implements hook_date_format_types_alter().
 *
 * @param array $types
 */
function xdruple_date_format_types_alter(&$types) {
  _xdruple_application_date_component()->dateFormatTypesAlter($types);
}

function _xdruple_application_date_component(): DateComponent {
  /** @var DateComponent $component */
  $component = xdruple_application()->component(DateComponent::NAME);
  return $component;
}

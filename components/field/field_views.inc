<?php declare(strict_types=1);

/**
 * @file keep Views module fields hooks implementations
 * @see  https://api.drupal.org/api/views/views.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\Field\Views\FieldViewsComponent;

/**
 * Implements hook_field_views_data().
 *
 * @param array $field
 *
 * @return array
 */
function xdruple_field_views_data($field) {
  return _xdruple_application_field_views_component()->fieldViewsData($field);
}

/**
 * Implements hook_field_views_data_views_data_alter().
 *
 * @param array $data
 * @param array $field
 */
function xdruple_field_views_data_views_data_alter(&$data, $field) {
  _xdruple_application_field_views_component()->fieldViewsDataViewsDataAlter($data, $field);
}

/**
 * Implements hook_field_views_data_alter().
 *
 * @param array  $result
 * @param array  $field
 * @param string $module
 */
function xdruple_field_views_data_alter(&$result, $field, $module) {
  _xdruple_application_field_views_component()->fieldViewsDataAlter($result, $field, $module);
}

function _xdruple_application_field_views_component(): FieldViewsComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(FieldViewsComponent::NAME);
  /** @var FieldViewsComponent $component */
  return $component;
}

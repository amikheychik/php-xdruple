<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Field\Formatter\FieldFormatterComponent;

/**
 * Implements hook_field_formatter_info().
 *
 * @return array
 */
function xdruple_field_formatter_info() {
  return _xdruple_application_field_formatter_component()->fieldFormatterInfo();
}

/**
 * Implements hook_field_formatter_info_alter().
 *
 * @param $info
 */
function xdruple_field_formatter_info_alter(&$info) {
  _xdruple_application_field_formatter_component()->fieldFormatterInfoAlter($info);
}

/**
 * Implements hook_field_formatter_prepare_view().
 *
 * @param $entity_type
 * @param $entities
 * @param $field
 * @param $instances
 * @param $langcode
 * @param $items
 * @param $displays
 */
function xdruple_field_formatter_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items,
                                              $displays) {
  _xdruple_application_field_formatter_component()->fieldFormatterPrepareView(
    $entity_type, $entities, $field, $instances, $langcode, $items, $displays
  );
}

/**
 * Implements hook_field_formatter_view().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 * @param $display
 *
 * @return array
 */
function xdruple_field_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display) {
  return _xdruple_application_field_formatter_component()->fieldFormatterView(
    $entity_type, $entity, $field, $instance, $langcode, $items, $display
  );
}

/**
 * Implements hook_field_formatter_settings_summary().
 *
 * @param $field
 * @param $instance
 * @param $view_mode
 *
 * @return string
 */
function xdruple_field_formatter_settings_summary($field, $instance, $view_mode) {
  return _xdruple_application_field_formatter_component()->fieldFormatterSettingsSummary($field, $instance, $view_mode);
}

/**
 * Implements hook_field_formatter_settings_form().
 *
 * @param $field
 * @param $instance
 * @param $view_mode
 * @param $form
 * @param $form_state
 *
 * @return array
 */
function xdruple_field_formatter_settings_form($field, $instance, $view_mode, $form, &$form_state) {
  return _xdruple_application_field_formatter_component()->fieldFormatterSettingsForm(
    $field, $instance, $view_mode, $form, $form_state
  );
}

function _xdruple_application_field_formatter_component(): FieldFormatterComponent {
  /** @var FieldFormatterComponent $component */
  $component = xdruple_application()->component(FieldFormatterComponent::NAME);
  return $component;
}

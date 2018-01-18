<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Field\Widget\FieldWidgetComponent;

/**
 * Implements hook_field_widget_info().
 *
 * @return array
 */
function xdruple_field_widget_info() {
  return _xdruple_application_field_widget_component()->fieldWidgetInfo();
}

/**
 * Implements hook_field_widget_info_alter().
 *
 * @param $info
 */
function xdruple_field_widget_info_alter(&$info) {
  _xdruple_application_field_widget_component()->fieldWidgetInfoAlter($info);
}

/**
 * Implements hook_field_widget_form().
 *
 * @param $form
 * @param $form_state
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 * @param $delta
 * @param $element
 *
 * @return array
 */
function xdruple_field_widget_form(&$form, &$form_state, $field, $instance, $langcode, $items, $delta, $element) {
  return _xdruple_application_field_widget_component()->fieldWidgetForm(
    $form, $form_state, $field, $instance, $langcode, $items, $delta, $element
  );
}

/**
 * Implements hook_field_widget_form_alter().
 *
 * @param $element
 * @param $form_state
 * @param $context
 */
function xdruple_field_widget_form_alter(&$element, &$form_state, $context) {
  _xdruple_application_field_widget_component()->fieldWidgetFormAlter($element, $form_state, $context);
}

/**
 * Implements hook_field_widget_error().
 *
 * @param $element
 * @param $error
 * @param $form
 * @param $form_state
 */
function xdruple_field_widget_error($element, $error, $form, &$form_state) {
  _xdruple_application_field_widget_component()->fieldWidgetError($element, $error, $form, $form_state);
}

/**
 * Implements hook_field_widget_properties_alter().
 *
 * @param $widget
 * @param $context
 */
function xdruple_field_widget_properties_alter(&$widget, $context) {
  _xdruple_application_field_widget_component()->fieldWidgetPropertiesAlter($widget, $context);
}

/**
 * Implements hook_field_widget_settings_form().
 *
 * @param $field
 * @param $instance
 *
 * @return array
 */
function xdruple_field_widget_settings_form($field, $instance) {
  return _xdruple_application_field_widget_component()->fieldWidgetSettingsForm($field, $instance);
}

function _xdruple_application_field_widget_component(): FieldWidgetComponent {
  /** @var FieldWidgetComponent $component */
  $component = xdruple_application()->component(FieldWidgetComponent::NAME);
  return $component;
}

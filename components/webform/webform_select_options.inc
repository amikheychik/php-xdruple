<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\SelectOptions\WebformSelectOptionsComponent;

/**
 * Implements hook_webform_select_options_info().
 *
 * @return array
 */
function xdruple_webform_select_options_info() {
  return _xdruple_application_webform_select_options_component()->webformSelectOptionsInfo();
}

/**
 * Implements hook_webform_select_options_info_alter().
 *
 * @param array[] $items
 */
function xdruple_webform_select_options_info_alter(&$items) {
  _xdruple_application_webform_select_options_component()->webformSelectOptionsInfoAlter($items);
}

/**
 * Implements callback_webform_options().
 *
 * @see hook_webform_select_options_info()
 *
 * @param array $component
 * @param bool  $flat
 * @param array $arguments
 *
 * @return array
 */
function xdruple_webform_select_options($component, $flat, $arguments) {
  return _xdruple_application_webform_select_options_component()->webformSelectOptions($component, $flat, $arguments);
}

function _xdruple_application_webform_select_options_component(): WebformSelectOptionsComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(WebformSelectOptionsComponent::NAME);
  /** @var WebformSelectOptionsComponent $component */
  return $component;
}

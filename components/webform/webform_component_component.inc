<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\WebformComponent;
use Xtuple\Xdruple\Application\Component\Component\Webform\Component\WebformComponentComponent;

/**
 * Implements hook_webform_component_info()
 *
 * @return array
 */
function xdruple_webform_component_info() {
  return _xdruple_application_webform_component_component()->webformComponentInfo();
}

/**
 * Implements hook_webform_component_info_alter()
 *
 * @param array $components
 */
function xdruple_webform_component_info_alter(&$components) {
  _xdruple_application_webform_component_component()->webformComponentInfoAlter($components);
}

/**
 * Implements hook_webform_component_defaults_alter()
 *
 * @param array  $defaults
 * @param string $type
 */
function xdruple_webform_component_defaults_alter(&$defaults, $type) {
  _xdruple_application_webform_component_component()->webformComponentDefaultsAlter($defaults, $type);
}

/**
 * Implements hook_webform_component_render_alter()
 *
 * @param array $element
 * @param array $component
 */
function xdruple_webform_component_render_alter(&$element, &$component) {
  _xdruple_application_webform_component_component()->webformComponentRenderAlter($element, $component);
}

/**
 * Implements hook_webform_component_display_alter()
 *
 * @param array $element
 * @param array $component
 */
function xdruple_webform_component_display_alter(&$element, &$component) {
  _xdruple_application_webform_component_component()->webformComponentDisplayAlter($element, $component);
}

/**
 * Implements hook_webform_analysis_component_data_alter()
 *
 * @param array $data
 * @param       $node
 * @param array $component
 */
function xdruple_webform_analysis_component_data_alter(&$data, $node, $component) {
  _xdruple_application_webform_component_component()->webformAnalysisComponentDataAlter($data, $node, $component);
}

/**
 * Implements hook_webform_component_load()
 *
 * @see webform_node_load()
 */
function xdruple_webform_component_load() {
  // This hook does not exist. Instead use hook_node_load().
}

/**
 * Implements hook_webform_component_presave()
 *
 * @param array $component
 */
function xdruple_webform_component_presave(&$component) {
  _xdruple_application_webform_component_component()->webformComponentPresave($component);
}

/**
 * Implements hook_webform_component_insert()
 *
 * @param array $component
 */
function xdruple_webform_component_insert($component) {
  _xdruple_application_webform_component_component()->webformComponentInsert($component);
}

/**
 * Implements hook_webform_component_update()
 *
 * @param array $component
 */
function xdruple_webform_component_update($component) {
  _xdruple_application_webform_component_component()->webformComponentUpdate($component);
}

/**
 * Implements hook_webform_component_delete()
 *
 * @param $component
 */
function xdruple_webform_component_delete($component) {
  _xdruple_application_webform_component_component()->webformComponentDelete($component);
}

function _xdruple_application_webform_component_component(): WebformComponentComponent {
  /** @var WebformComponentComponent $component */
  $component = xdruple_application()->component(WebformComponentComponent::NAME);
  return $component;
}

function _xdruple_application_webform_component(string $name): WebformComponent {
  return _xdruple_application_webform_component_component()->webformComponent($name);
}

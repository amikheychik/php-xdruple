<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\Webform\WebformComponent;

/**
 * Implements hook_webform_analysis_alter().
 *
 * @param array $analysis - Drupal render array
 */
function xdruple_webform_analysis_alter(&$analysis) {
  _xdruple_application_webform_webform_component()->webformAnalysisAlter($analysis);
}

/**
 * Implements hook_webform_node_defaults_alter().
 *
 * @param array $defaults
 */
function xdruple_webform_node_defaults_alter(&$defaults) {
  _xdruple_application_webform_webform_component()->webformNodeDefaultsAlter($defaults);
}

/**
 * Implements hook_webform_view_alter().
 *
 * @param \view  $view
 * @param string $display_id
 * @param array  $args
 */
function xdruple_webform_view_alter($view, $display_id, $args) {
  _xdruple_application_webform_webform_component()->webformViewAlter($view, $display_id, $args);
}

/**
 * Implements hook_webform_html_capable_mail_systems_alter().
 *
 * @param array $systems
 */
function xdruple_webform_html_capable_mail_systems_alter(&$systems) {
  _xdruple_application_webform_webform_component()->webformHtmlCapableMailSystemsAlter($systems);
}

function _xdruple_application_webform_webform_component(): WebformComponent {
  /** @var WebformComponent $component */
  $component = xdruple_application()->component(WebformComponent::NAME);
  return $component;
}

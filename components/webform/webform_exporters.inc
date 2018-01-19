<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\Exporters\WebformExportersComponent;

/**
 * Implements hook_webform_exporters().
 *
 * @return array
 */
function xdruple_webform_exporters() {
  return _xdruple_application_webform_exporters_component()->webformExporters();
}

/**
 * Implements hook_webform_exporters_alter().
 *
 * @param array $exporters
 */
function xdruple_webform_exporters_alter(&$exporters) {
  _xdruple_application_webform_exporters_component()->webformExportersAlter($exporters);
}

function _xdruple_application_webform_exporters_component(): WebformExportersComponent {
  /** @var WebformExportersComponent $component */
  $component = xdruple_application()->component(WebformExportersComponent::NAME);
  return $component;
}

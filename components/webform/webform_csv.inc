<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\CSV\WebformCSVComponent;

/**
 * Implements hook_webform_csv_header_alter().
 *
 * @param $header
 * @param $component
 */
function xdruple_webform_csv_header_alter(&$header, $component) {
  _xdruple_application_webform_csv_component()->webformCSVHeaderAlter($header, $component);
}

/**
 * Implements hook_webform_csv_data_alter().
 *
 * @param $data
 * @param $component
 * @param $submission
 */
function xdruple_webform_csv_data_alter(&$data, $component, $submission) {
  _xdruple_application_webform_csv_component()->webformCSVDataAlter($data, $component, $submission);
}

function _xdruple_application_webform_csv_component(): WebformCSVComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(WebformCSVComponent::NAME);
  /** @var WebformCSVComponent $component */
  return $component;
}

<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\ResultsDownload\WebformResultsDownloadComponent;

/**
 * Implements hook_webform_results_download_submission_information_info()
 *
 * @return array
 */
function xdruple_webform_results_download_submission_information_info() {
  return _xdruple_application_webform_results_download_component()->webformResultsDownloadSubmissionInformationInfo();
}

/**
 * Implements hook_webform_results_download_submission_information_data()
 *
 * @param string $token
 * @param        $submission
 * @param array  $options
 * @param int    $serial_start
 * @param int    $row_count
 *
 * @return string
 */
function xdruple_webform_results_download_submission_information_data($token, $submission, array $options,
                                                                      $serial_start, $row_count) {
  return _xdruple_application_webform_results_download_component()->webformResultsDownloadSubmissionInformationData(
    $token,
    $submission,
    $options,
    $serial_start,
    $row_count
  );
}

function _xdruple_application_webform_results_download_component(): WebformResultsDownloadComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(WebformResultsDownloadComponent::NAME);
  /** @var WebformResultsDownloadComponent $component */
  return $component;
}

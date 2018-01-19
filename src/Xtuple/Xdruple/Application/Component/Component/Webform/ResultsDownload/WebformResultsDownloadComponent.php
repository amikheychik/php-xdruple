<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\ResultsDownload;

interface WebformResultsDownloadComponent {
  public const NAME = 'webform_results_download';

  /**
   * @see hook_webform_results_download_submission_information_info()
   *
   * @return array
   */
  public function webformResultsDownloadSubmissionInformationInfo();

  /**
   * @see hook_webform_results_download_submission_information_data()
   *
   * @param string $token
   * @param        $submission
   * @param array  $options
   * @param int    $serialStart
   * @param int    $rowCount
   *
   * @return string
   */
  public function webformResultsDownloadSubmissionInformationData($token, $submission, array $options, $serialStart,
                                                                  $rowCount);
}

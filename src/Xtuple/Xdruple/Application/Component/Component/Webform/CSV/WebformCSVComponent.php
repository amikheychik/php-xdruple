<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\CSV;

interface WebformCSVComponent {
  public const NAME = 'webform_csv';

  /**
   * @see hook_webform_csv_header_alter()
   *
   * @param $header
   * @param $component
   */
  public function webformCSVHeaderAlter(&$header, $component);

  /**
   * @see hook_webform_csv_data_alter()
   *
   * @param $data
   * @param $component
   * @param $submission
   */
  public function webformCSVDataAlter(&$data, $component, $submission);
}

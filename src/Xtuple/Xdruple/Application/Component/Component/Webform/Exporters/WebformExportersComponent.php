<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Exporters;

interface WebformExportersComponent {
  public const NAME = 'webform_exporters';

  /**
   * @see hook_webform_exporters()
   *
   * @return array
   */
  public function webformExporters();

  /**
   * @see hook_webform_exporters_alter()
   *
   * @param array $exporters
   */
  public function webformExportersAlter(&$exporters);
}

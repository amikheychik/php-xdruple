<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Drupal;

interface DrupalBatchFunctions {
  /**
   * @see batch_set()
   *
   * @param array $batchDefinition
   *
   * @return void
   */
  public function batchSet($batchDefinition): void;
}

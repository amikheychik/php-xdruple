<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Drupal;

final class DrupalBatchFunctionsStatic
  implements DrupalBatchFunctions {
  public static $batches = [
    'sets' => [],
  ];

  public function batchSet($batchDefinition): void {
    self::$batches['sets'][] = $batchDefinition;
  }
}

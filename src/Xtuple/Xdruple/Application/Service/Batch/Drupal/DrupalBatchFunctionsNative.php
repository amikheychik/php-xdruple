<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Drupal;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalBatchFunctionsNative
  implements DrupalBatchFunctions {
  public function batchSet($batchDefinition): void {
    batch_set($batchDefinition);
  }
}

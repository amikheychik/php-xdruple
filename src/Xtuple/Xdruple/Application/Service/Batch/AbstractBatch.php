<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch;

use Xtuple\Xdruple\Application\Service\Batch\Drupal\DrupalBatchFunctions;
use Xtuple\Xdruple\Application\Service\Batch\Process\Process;

abstract class AbstractBatch
  implements Batch {
  /** @var DrupalBatchFunctions */
  private $drupal;

  public function __construct(DrupalBatchFunctions $drupal) {
    $this->drupal = $drupal;
  }

  public final function set(Process $batch) {
    $operations = [];
    foreach ($batch->operations() as $operation) {
      $operations[] = [
        $operation->id(),
        $operation,
      ];
    }
    $css = [];
    foreach ($batch->css() as $file) {
      $css[] = (string) $file->data();
    }
    $this->drupal->batchSet([
        'operations' => $operations,
      ] + array_filter([
        'title' => $batch->title(),
        'init_message' => $batch->messages()->init(),
        'progress_message' => $batch->messages()->progress(),
        'error_message' => $batch->messages()->error(),
        'css' => $css,
        'url_options' => $batch->urlOptions(),
      ])
    );
  }
}

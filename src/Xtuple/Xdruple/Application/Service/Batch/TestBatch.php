<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch;

use Xtuple\Xdruple\Application\Service\Batch\Drupal\DrupalBatchFunctionsStatic;

final class TestBatch
  extends AbstractBatch {
  public function __construct() {
    parent::__construct(new DrupalBatchFunctionsStatic());
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch;

use Xtuple\Xdruple\Application\Service\Batch\Process\Process;

interface Batch {
  public function set(Process $process);
}

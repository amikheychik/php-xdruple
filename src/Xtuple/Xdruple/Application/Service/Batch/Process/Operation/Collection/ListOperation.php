<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection;

use Xtuple\Util\Collection\Sequence\Sequence;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Operation;

interface ListOperation
  extends Sequence {
  /**
   * @param int $key
   *
   * @return Operation|null
   */
  public function get(int $key);

  /**
   * @return Operation|null
   */
  public function current();
}

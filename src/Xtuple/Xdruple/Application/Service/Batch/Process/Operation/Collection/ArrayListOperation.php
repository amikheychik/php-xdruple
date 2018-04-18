<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection;

use Xtuple\Util\Collection\Sequence\ArrayList\StrictType\AbstractStrictlyTypedArrayList;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Operation;

final class ArrayListOperation
  extends AbstractStrictlyTypedArrayList
  implements ListOperation {
  /**
   * @throws \Throwable - if the elements are of the wrong type
   *
   * @param Operation[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(Operation::class, $elements);
  }
}

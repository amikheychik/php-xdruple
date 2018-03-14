<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation;

abstract class AbstractOperation
  implements Operation {
  /** @var string */
  private $id;

  public function __construct(string $id) {
    $this->id = $id;
  }

  public final function id(): string {
    return $this->id;
  }
}

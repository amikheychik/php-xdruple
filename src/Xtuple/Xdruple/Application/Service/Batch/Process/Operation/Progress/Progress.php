<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Progress;

use Xtuple\Util\Type\String\Message\Message\Message;

interface Progress {
  public function completed(): int;

  public function total(): int;

  public function message(): ?Message;
}

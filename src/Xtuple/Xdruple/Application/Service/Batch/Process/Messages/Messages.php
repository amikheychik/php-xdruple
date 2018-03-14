<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Messages;

use Xtuple\Util\Type\String\Message\Message\Message;

interface Messages {
  public function init(): ?Message;

  public function progress(): ?Message;

  public function error(): ?Message;
}

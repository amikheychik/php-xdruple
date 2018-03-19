<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token\Message;

interface Message {
  public function string(): string;

  public function data(): array;
}

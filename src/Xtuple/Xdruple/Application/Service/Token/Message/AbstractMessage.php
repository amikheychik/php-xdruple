<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token\Message;

abstract class AbstractMessage
  implements Message {
  /** @var Message */
  private $string;

  public function __construct(Message $string) {
    $this->string = $string;
  }

  public final function string(): string {
    return $this->string->string();
  }

  public final function data(): array {
    return $this->string->data();
  }
}

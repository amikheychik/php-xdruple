<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token\Message;

final class MessageStruct
  implements Message {
  /** @var string */
  private $string;
  /** @var array */
  private $data;

  public function __construct(string $string, array $data = []) {
    $this->string = $string;
    $this->data = $data;
  }

  public function string(): string {
    return $this->string;
  }

  public function data(): array {
    return $this->data;
  }
}


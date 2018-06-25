<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token;

abstract class AbstractToken
  implements Token {
  /** @var string */
  private $token;
  /** @var string */
  private $name;
  /** @var string */
  private $description;

  public function __construct(string $token, string $name, string $description = '') {
    $this->token = $token;
    $this->name = $name;
    $this->description = $description;
  }

  public final function token(): string {
    return $this->token;
  }

  public final function name(): string {
    return $this->name;
  }

  public final function description(): string {
    return $this->description;
  }
}

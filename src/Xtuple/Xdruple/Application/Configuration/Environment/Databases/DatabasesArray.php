<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment\Databases;

final class DatabasesArray
  implements Databases {
  /** @var array */
  private $value;

  public function __construct(array $value) {
    $this->value = $value;
  }

  public function value(): array {
    return $this->value;
  }
}

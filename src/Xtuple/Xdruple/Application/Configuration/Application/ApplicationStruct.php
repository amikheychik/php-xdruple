<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Application;

final class ApplicationStruct
  implements Application {
  /** @var array */
  private $value;

  public function __construct(array $value) {
    $this->value = $value;
  }

  public function value(): array {
    return $this->value;
  }
}

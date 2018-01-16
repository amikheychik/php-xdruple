<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

final class EnvironmentArray
  implements Environment {
  /** @var array */
  private $environment;

  public function __construct(array $environment) {
    $this->environment = $environment;
  }

  public function configuration(): array {
    return $this->environment;
  }
}

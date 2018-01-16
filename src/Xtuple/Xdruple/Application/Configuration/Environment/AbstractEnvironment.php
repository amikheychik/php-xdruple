<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

abstract class AbstractEnvironment
  implements Environment {
  /** @var Environment */
  private $environment;

  public function __construct(Environment $environment) {
    $this->environment = $environment;
  }

  public final function configuration(): array {
    return $this->environment->configuration();
  }
}

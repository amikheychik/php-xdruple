<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration;

abstract class AbstractConfiguration
  implements Configuration {
  /** @var Configuration */
  private $configuration;

  public function __construct(Configuration $configuration) {
    $this->configuration = $configuration;
  }

  public final function value(): array {
    return $this->configuration->value();
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Package;

abstract class AbstractPackage
  implements Package {
  /** @var Package */
  private $package;

  public function __construct(Package $package) {
    $this->package = $package;
  }

  public final function type(): string {
    return $this->package->type();
  }

  public final function path(): string {
    return $this->package->path();
  }
}

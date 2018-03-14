<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Package;

final class PackageStruct
  implements Package {
  /** @var string */
  private $type;
  /** @var string */
  private $path;

  public function __construct(string $type, string $path) {
    $this->type = $type;
    $this->path = $path;
  }

  public function type(): string {
    return $this->type;
  }

  public function path(): string {
    return $this->path;
  }
}

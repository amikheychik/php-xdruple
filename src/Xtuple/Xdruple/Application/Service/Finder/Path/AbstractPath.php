<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path;

abstract class AbstractPath
  implements Path {
  /** @var Path */
  private $path;

  public function __construct(Path $path) {
    $this->path = $path;
  }

  public final function relative(): string {
    return $this->path->relative();
  }

  public final function absolute(): string {
    return $this->path->absolute();
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Path;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Extension;

abstract class AbstractPath
  implements Path {
  /** @var Resource */
  private $path;

  public function __construct(Path $path) {
    $this->path = $path;
  }

  public final function extension(): Extension {
    return $this->path->extension();
  }

  public final function relative(): ?string {
    return $this->path->relative();
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path\Finder;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Path as ExtensionPath;
use Xtuple\Xdruple\Application\Service\Finder\Finder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Path;

abstract class AbstractPathFinder
  implements Path {
  /** @var Finder */
  private $finder;
  /** @var ExtensionPath */
  private $path;

  public function __construct(Finder $finder, ExtensionPath $path) {
    $this->finder = $finder;
    $this->path = $path;
  }

  public final function relative(): string {
    return $this->path()->relative();
  }

  public final function absolute(): string {
    return $this->path()->absolute();
  }

  /** @var null|Path */
  private $found = null;

  private function path(): Path {
    if ($this->found === null) {
      $this->found = $this->finder->extension($this->path);
    }
    return $this->found;
  }
}

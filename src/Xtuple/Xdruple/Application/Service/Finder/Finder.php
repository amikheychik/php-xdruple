<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Path as ExtensionPath;
use Xtuple\Xdruple\Application\Service\Finder\Path\Path;

interface Finder {
  public function extension(ExtensionPath $path): Path;
}

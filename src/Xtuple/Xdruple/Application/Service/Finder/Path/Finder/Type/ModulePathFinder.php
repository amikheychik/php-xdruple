<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\ModulePath;
use Xtuple\Xdruple\Application\Service\Finder\Finder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\AbstractPathFinder;

final class ModulePathFinder
  extends AbstractPathFinder {
  public function __construct(Finder $finder, string $module, ?string $relative = null) {
    parent::__construct($finder, new ModulePath($module, $relative));
  }
}

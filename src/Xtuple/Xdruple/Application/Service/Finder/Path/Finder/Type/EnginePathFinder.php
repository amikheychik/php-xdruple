<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\EnginePath;
use Xtuple\Xdruple\Application\Service\Finder\Finder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\AbstractPathFinder;

final class EnginePathFinder
  extends AbstractPathFinder {
  public function __construct(Finder $finder, string $engine, ?string $relative = null) {
    parent::__construct($finder, new EnginePath($engine, $relative));
  }
}

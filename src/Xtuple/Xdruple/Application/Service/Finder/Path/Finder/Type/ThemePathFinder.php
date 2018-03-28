<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\ThemePath;
use Xtuple\Xdruple\Application\Service\Finder\Finder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\AbstractPathFinder;

final class ThemePathFinder
  extends AbstractPathFinder {
  public function __construct(Finder $finder, string $theme, ?string $relative = null) {
    parent::__construct($finder, new ThemePath($theme, $relative));
  }
}

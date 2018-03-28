<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\AbstractPath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\PathStruct;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Theme\Theme;

final class ThemePath
  extends AbstractPath {
  public function __construct(string $theme, ?string $relative = null) {
    parent::__construct(new PathStruct(new Theme($theme), $relative));
  }
}

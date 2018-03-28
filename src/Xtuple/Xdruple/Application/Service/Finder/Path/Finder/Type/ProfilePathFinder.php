<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\ProfilePath;
use Xtuple\Xdruple\Application\Service\Finder\Finder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\AbstractPathFinder;

final class ProfilePathFinder
  extends AbstractPathFinder {
  public function __construct(Finder $finder, string $profile, ?string $relative = null) {
    parent::__construct($finder, new ProfilePath($profile, $relative));
  }
}

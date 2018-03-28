<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\AbstractPath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\PathStruct;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Profile\Profile;

final class ProfilePath
  extends AbstractPath {
  public function __construct(string $profile, ?string $relative = null) {
    parent::__construct(new PathStruct(new Profile($profile), $relative));
  }
}

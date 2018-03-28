<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Path;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Extension;

interface Path {
  public function extension(): Extension;

  public function relative(): ?string;
}

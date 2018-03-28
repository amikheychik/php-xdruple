<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Type;

interface Extension {
  public function type(): Type;

  public function name(): string;
}

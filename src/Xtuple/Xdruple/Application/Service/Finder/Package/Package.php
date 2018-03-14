<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Package;

interface Package {
  public function type(): string;

  public function path(): string;
}

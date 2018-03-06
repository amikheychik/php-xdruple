<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL\URI;

interface URI {
  public function path(): string;

  public function options(): array;
}

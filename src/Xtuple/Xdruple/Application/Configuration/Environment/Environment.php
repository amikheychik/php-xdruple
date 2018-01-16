<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

interface Environment {
  public function configuration(): array;
}

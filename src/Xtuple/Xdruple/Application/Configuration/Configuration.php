<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration;

interface Configuration {
  public function value(): array;
}

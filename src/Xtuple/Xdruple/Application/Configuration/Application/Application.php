<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Application;

use Xtuple\Xdruple\Application\Configuration\Configuration;

interface Application
  extends Configuration {
  public function value(): array;
}

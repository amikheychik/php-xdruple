<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache;

use Xtuple\Xdruple\Application\Service\Cache\Bin\Bin;

interface Cache {
  public function bin(string $name): Bin;
}

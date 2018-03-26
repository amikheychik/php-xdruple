<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache;

use Xtuple\Xdruple\Application\Service\Cache\Bin\Bin;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\DrupalBin;

final class DrupalCache
  implements Cache {
  /** @var Bin[] */
  private $bins = [];

  public function bin(string $name): Bin {
    if (!isset($this->bins[$name])) {
      $this->bins[$name] = new DrupalBin($name);
    }
    return $this->bins[$name];
  }
}

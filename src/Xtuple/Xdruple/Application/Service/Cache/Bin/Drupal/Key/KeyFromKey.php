<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key;

use Xtuple\Util\Cache\Key\AbstractKey;

final class KeyFromKey
  extends AbstractKey
  implements Key {
  public function __toString(): string {
    return $this->cid();
  }

  public function cid(): string {
    return implode(':', $this->fields());
  }
}

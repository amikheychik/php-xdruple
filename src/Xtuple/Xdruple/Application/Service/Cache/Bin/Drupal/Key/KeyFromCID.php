<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key;

use Xtuple\Util\Cache\Key\AbstractKey;
use Xtuple\Util\Cache\Key\Key;
use Xtuple\Util\Cache\Key\KeyStruct;

final class KeyFromCID
  extends AbstractKey
  implements Key {
  /** @var string */
  private $cid;

  public function __construct(string $cid) {
    parent::__construct(new KeyStruct(explode(':', $cid)));
    $this->cid = $cid;
  }

  public function __toString(): string {
    return $this->cid;
  }

  public function cid(): string {
    return $this->cid;
  }
}

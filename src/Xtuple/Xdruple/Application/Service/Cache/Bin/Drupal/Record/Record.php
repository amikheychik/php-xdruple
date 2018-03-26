<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record;

use Xtuple\Util\Cache\Record\Record as CacheRecord;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key\Key;

interface Record
  extends CacheRecord {
  /**
   * @return Key
   */
  public function key();

  public function expire(): int;

  public function expired(): bool;
}

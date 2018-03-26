<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin;

use Xtuple\Util\Cache\Cache;
use Xtuple\Util\Cache\Key\Key;
use Xtuple\Util\Cache\Record\Record as CacheRecord;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record\Record;

interface Bin
  extends Cache {
  public function name(): string;

  /**
   * @return Record
   *
   * @param CacheRecord $record
   */
  public function insert(CacheRecord $record);

  /**
   * @return null|Record
   *
   * @param Key $key
   */
  public function find(Key $key);
}

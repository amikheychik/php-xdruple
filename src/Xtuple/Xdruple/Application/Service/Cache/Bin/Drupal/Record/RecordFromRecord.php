<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record;

use Xtuple\Util\Cache\Record\Record;
use Xtuple\Util\Type\DateTime\Timestamp\TimestampDateTime;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key\KeyFromKey;
use Xtuple\Xdruple\Application\Service\Cache\Lifetime\Cache;

final class RecordFromRecord
  extends AbstractRecord {
  public function __construct(Record $cache) {
    parent::__construct(new RecordStruct(
      new KeyFromKey($cache->key()),
      $cache->value(),
      ($cache->expiresAt() === null)
        ? Cache::PERMANENT
        : (new TimestampDateTime($cache->expiresAt()))->seconds()
    ));
  }
}

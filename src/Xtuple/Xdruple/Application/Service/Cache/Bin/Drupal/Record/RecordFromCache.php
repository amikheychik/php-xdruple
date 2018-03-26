<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record;

use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key\KeyFromCID;

final class RecordFromCache
  extends AbstractRecord {
  public function __construct(\stdClass $cache) {
    parent::__construct(new RecordStruct(
      new KeyFromCID($cache->cid),
      $cache->data,
      (int) $cache->expire
    ));
  }
}

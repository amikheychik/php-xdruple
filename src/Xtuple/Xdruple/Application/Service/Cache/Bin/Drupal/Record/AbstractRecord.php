<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record;

use Xtuple\Util\Cache\Record\AbstractRecord as AbstractCacheRecord;

abstract class AbstractRecord
  extends AbstractCacheRecord
  implements Record {
  /** @var Record */
  private $record;

  public function __construct(Record $record) {
    parent::__construct($record);
    $this->record = $record;
  }

  public final function expire(): int {
    return $this->record->expire();
  }

  public final function expired(): bool {
    return $this->record->expired();
  }
}

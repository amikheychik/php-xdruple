<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record;

use Xtuple\Util\Cache\Key\Key;
use Xtuple\Util\Cache\Record\AbstractRecord;
use Xtuple\Util\Cache\Record\RecordStruct as CacheRecordStruct;
use Xtuple\Util\Type\DateTime\DateTimeTimestamp;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key\KeyFromKey;
use Xtuple\Xdruple\Application\Service\Cache\Lifetime\Cache;

final class RecordStruct
  extends AbstractRecord
  implements Record {
  /** @var int */
  private $expire;

  public function __construct(Key $key, $data, int $expire = Cache::PERMANENT) {
    /** @noinspection PhpUnhandledExceptionInspection - argument checked to be positive */
    $expiresAt = $expire > 0 ? new DateTimeTimestamp($expire) : null;
    parent::__construct(new CacheRecordStruct(
      new KeyFromKey($key),
      $data,
      $expiresAt
    ));
    $this->expire = $expire;
  }

  public function expire(): int {
    return $this->expire;
  }

  /**
   * @see https://www.drupal.org/node/534092 - cache_get() default doesn't check if record expired
   *
   * @return bool
   */
  public function expired(): bool {
    return (
      $this->expire != Cache::PERMANENT
      && $this->expire != Cache::TEMPORARY
      && $this->expire <= (int) $_SERVER['REQUEST_TIME']
    );
  }
}

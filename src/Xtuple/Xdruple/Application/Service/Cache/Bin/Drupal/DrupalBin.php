<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal;

use Xtuple\Util\Cache\Key\Key;
use Xtuple\Util\Cache\Record\Record as CacheRecord;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Bin;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key\KeyFromKey;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record\Record;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record\RecordFromCache;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record\RecordFromRecord;

final class DrupalBin
  implements Bin {
  /** @var string */
  private $name;

  public function __construct(string $name) {
    $this->name = $name;
  }

  public function name(): string {
    return $this->name;
  }

  public function serialize() {
    return $this->name;
  }

  public function unserialize($serialized) {
    $this->__construct($serialized);
  }

  /**
   * @codeCoverageIgnore Drupal
   *
   * @return Record
   *
   * @param CacheRecord $record
   */
  public function insert(CacheRecord $record) {
    $record = new RecordFromRecord($record);
    /** @var Record $record */
    cache_set(
      $record->key()->cid(),
      $record->value(),
      $this->name,
      $record->expire()
    );
    return $record;
  }

  /**
   * @codeCoverageIgnore Drupal
   *
   * @return null|Record
   *
   * @param Key $key
   */
  public function find(Key $key) {
    if ($cache = cache_get((string) new KeyFromKey($key), $this->name)) {
      $record = new RecordFromCache($cache);
      if (!$record->expired()) {
        return $record;
      }
    }
    return null;
  }

  /**
   * @codeCoverageIgnore Drupal
   *
   * @param Key $key
   *
   * @return void
   */
  public function delete(Key $key): void {
    cache_clear_all(
      (string) new KeyFromKey($key),
      $this->name,
      true
    );
  }

  /**
   * @codeCoverageIgnore Drupal
   *
   * @return void
   */
  public function clear(): void {
    cache_clear_all('*', $this->name, true);
  }

  /**
   * @codeCoverageIgnore Drupal
   *
   * @return bool
   */
  public function isEmpty(): bool {
    return (bool) cache_is_empty($this->name);
  }
}

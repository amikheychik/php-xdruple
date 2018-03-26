<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Test;

use Xtuple\Util\Cache\Cache\Memory\MemoryCache;
use Xtuple\Util\Cache\Key\Key;
use Xtuple\Util\Cache\Record\Record as CacheRecord;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Bin;
use Xtuple\Xdruple\Application\Service\Cache\Cache;

final class TestBin
  implements Bin {
  /** @var string */
  private $name;
  /** @var Cache */
  private $cache;

  public function __construct(string $name) {
    $this->name = $name;
    $this->cache = new MemoryCache($name);
  }

  public function serialize() {
    return $this->name;
  }

  public function unserialize($serialized) {
    $this->__construct($serialized);
  }

  public function name(): string {
    return $this->name;
  }

  public function insert(CacheRecord $record) {
    return $this->cache->insert($record);
  }

  public function find(Key $key) {
    return $this->cache->find($key);
  }

  public function delete(Key $key): void {
    $this->cache->delete($key);
  }

  public function clear(): void {
    $this->cache->clear();
  }

  public function isEmpty(): bool {
    return $this->cache->isEmpty();
  }
}

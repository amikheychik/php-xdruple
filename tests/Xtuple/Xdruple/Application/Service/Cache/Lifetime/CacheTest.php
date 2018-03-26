<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Lifetime;

use PHPUnit\Framework\TestCase;

class CacheTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Value `1` is not supported
   */
  public function testEnum() {
    $cache = Cache::PERMANENT();
    self::assertEquals(0, $cache->value());
    self::assertTrue($cache->isPermanent());
    self::assertFalse($cache->isTemporary());
    $cache = Cache::TEMPORARY();
    self::assertEquals(-1, $cache->value());
    self::assertTrue($cache->isTemporary());
    self::assertFalse($cache->isPermanent());
    /** @noinspection PhpUnhandledExceptionInspection */
    new Cache(1);
  }
}

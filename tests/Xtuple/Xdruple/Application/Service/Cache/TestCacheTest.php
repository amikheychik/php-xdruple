<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Cache\Record\RecordStruct;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Bin;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key\KeyFromCID;

class TestCacheTest
  extends TestCase {
  public function testBin() {
    $cache = new TestCache();
    $cacheBin = $cache->bin('cache');
    self::assertTrue($cacheBin->isEmpty());
    self::assertSame($cacheBin, $cache->bin('cache'));
    $serialized = serialize($cacheBin);
    self::assertEquals(
      'C:57:"Xtuple\Xdruple\Application\Service\Cache\Bin\Test\TestBin":5:{cache}',
      $serialized
    );
    /** @var Bin $unserialized */
    $unserialized = unserialize($serialized);
    self::assertEquals('cache', $unserialized->name());
    $cache->bin('cache')->insert(new RecordStruct(new KeyFromCID('field:node:1'), ['user' => 'Test']));
    self::assertEquals('Test', $cacheBin->find(new KeyFromCID('field:node:1'))->value()['user']);
    self::assertEquals('Test', $unserialized->find(new KeyFromCID('field:node:1'))->value()['user']);
    self::assertFalse($cache->bin('cache')->isEmpty());
    $cache->bin('cache')->clear();
    self::assertTrue($cache->bin('cache')->isEmpty());
    $cache->bin('cache')->insert(new RecordStruct(new KeyFromCID('field:node:1'), ['user' => 'Test']));
    $cache->bin('cache')->insert(new RecordStruct(new KeyFromCID('field:node:2'), ['user' => 'Test']));
    self::assertNull($cache->bin('cache_block')->find(new KeyFromCID('field:node:1')));
    self::assertEquals('Test', $cache->bin('cache')->find(new KeyFromCID('field:node:1'))->value()['user']);
    $cacheBin->delete(new KeyFromCID('field:node:1'));
    self::assertNull($cache->bin('cache')->find(new KeyFromCID('field:node:1')));
    self::assertFalse($unserialized->isEmpty());
    $cacheBin->delete(new KeyFromCID('field:node:2'));
    self::assertTrue($unserialized->isEmpty());
  }
}

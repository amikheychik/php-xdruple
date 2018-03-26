<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache;

use PHPUnit\Framework\TestCase;

class DrupalCacheTest
  extends TestCase {
  public function testBin() {
    $cache = new DrupalCache();
    self::assertEquals('cache', $cache->bin('cache')->name());
  }
}

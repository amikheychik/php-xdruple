<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal;

use PHPUnit\Framework\TestCase;

class DrupalBinTest
  extends TestCase {
  public function testBin() {
    $bin = new DrupalBin('test');
    $serialized = serialize($bin);
    self::assertEquals(
      'C:61:"Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\DrupalBin":4:{test}',
      $serialized
    );
    $bin = unserialize($serialized);
    self::assertEquals('test', $bin->name());
  }
}

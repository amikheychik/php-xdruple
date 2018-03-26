<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Cache\Key\KeyStruct;

class KeyTest
  extends TestCase {
  public function testFromKey() {
    $key = new KeyFromKey(new KeyStruct([
      'field',
      'node',
      1,
    ]));
    self::assertEquals('field:node:1', (string) $key);
    self::assertEquals('field:node:1', $key->cid());
    self::assertEquals([
      'field',
      'node',
      1,
    ], $key->fields());
  }

  public function testFromCid() {
    $key = new KeyFromCID('field:node:1');
    self::assertEquals('field:node:1', (string) $key);
    self::assertEquals('field:node:1', $key->cid());
    self::assertEquals([
      'field',
      'node',
      1,
    ], $key->fields());
  }
}

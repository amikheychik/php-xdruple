<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Variable;

use PHPUnit\Framework\TestCase;

class VariableTest
  extends TestCase {
  public function testVariable() {
    $variable = new TestVariable();
    $serialized = serialize($variable);
    self::assertEquals(
      'O:56:"Xtuple\Xdruple\Application\Service\Variable\TestVariable":0:{}',
      $serialized
    );
    self::assertNull($variable->get('test'));
    self::assertEquals(0, $variable->get('test', 0));
    self::assertNull($variable->set('test', true));
    $unserialized = unserialize($serialized);
    self::assertTrue($unserialized->set('test', 1.0));
    self::assertEquals(1.0, $unserialized->get('test'));
    self::assertEquals(1.0, $unserialized->delete('test'));
    self::assertNull($variable->get('test'));
  }
}

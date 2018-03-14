<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group;

use PHPUnit\Framework\TestCase;

class CSSGroupTest
  extends TestCase {
  public function testGroup() {
    self::assertEquals(-100, (new CSSGroupSystem())->weight());
    self::assertEquals(0, (new CSSGroupDefault())->weight());
    self::assertEquals(100, (new CSSGroupTheme())->weight());
  }
}

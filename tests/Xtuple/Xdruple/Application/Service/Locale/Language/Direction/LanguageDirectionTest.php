<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language\Direction;

use PHPUnit\Framework\TestCase;

class LanguageDirectionTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Value `2` is not supported in
   *                           Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection enum
   */
  public function testEnum() {
    $direction = LanguageDirection::LTR();
    self::assertEquals(0, $direction->value());
    self::assertTrue($direction->is(0));
    self::assertTrue($direction->isLTR());
    self::assertFalse($direction->isRTL());
    $direction = LanguageDirection::RTL();
    self::assertEquals(1, $direction->value());
    self::assertTrue($direction->is(1));
    self::assertFalse($direction->isLTR());
    self::assertTrue($direction->isRTL());
    new LanguageDirection(2);
  }
}
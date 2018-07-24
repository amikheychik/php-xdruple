<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Currency\Precision;

use PHPUnit\Framework\TestCase;

class CurrencyPrecisionStructTest
  extends TestCase {
  public function testConstructor() {
    $precision = new CurrencyPrecisionStruct(null);
    self::assertNull($precision->precision());
    $precision = new CurrencyPrecisionStruct(4);
    self::assertEquals(4, $precision->precision());
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record\Referrer;

use PHPUnit\Framework\TestCase;

class LogRecordReferrerTest
  extends TestCase {
  public function testStruct() {
    $referrer = new LogRecordReferrerStruct('Products', 'products', ['fragment' => 'suggested']);
    self::assertEquals('Products', $referrer->title());
    self::assertEquals('products', $referrer->path());
    self::assertEquals([
      'fragment' => 'suggested',
    ], $referrer->options());
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Requirements\Enum;

use PHPUnit\Framework\TestCase;

class PhaseTest
  extends TestCase {
  /**
   * @expectedException \Throwable
   * @expectedExceptionMessage Value `shutdown` is not supported
   */
  public function testPhase() {
    $phase = Phase::INSTALL();
    self::assertEquals('install', $phase->value());
    self::assertTrue($phase->isInstall());
    self::assertFalse($phase->isUpdate());
    self::assertFalse($phase->isRuntime());
    $phase = Phase::UPDATE();
    self::assertEquals('update', $phase->value());
    self::assertFalse($phase->isInstall());
    self::assertTrue($phase->isUpdate());
    self::assertFalse($phase->isRuntime());
    $phase = Phase::RUNTIME();
    self::assertEquals('runtime', $phase->value());
    self::assertFalse($phase->isInstall());
    self::assertFalse($phase->isUpdate());
    self::assertTrue($phase->isRuntime());
    /** @noinspection PhpUnhandledExceptionInspection */
    new Phase('shutdown');
  }
}

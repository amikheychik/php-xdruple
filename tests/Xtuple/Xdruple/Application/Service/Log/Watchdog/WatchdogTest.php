<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Watchdog;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Message\MessageWithTokens;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\ErrorLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Watchdog\Record\WatchdogLogRecord;

class WatchdogTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Value `8` is not supported
   * @throws \Throwable
   */
  public function testEnum() {
    $watchdog = new Watchdog(Watchdog::EMERGENCY);
    self::assertTrue($watchdog->is(0));
    $watchdog = new Watchdog(Watchdog::ALERT);
    self::assertTrue($watchdog->is(1));
    $watchdog = new Watchdog(Watchdog::CRITICAL);
    self::assertTrue($watchdog->is(2));
    $watchdog = new Watchdog(Watchdog::ERROR);
    self::assertTrue($watchdog->is(3));
    $watchdog = new Watchdog(Watchdog::WARNING);
    self::assertTrue($watchdog->is(4));
    $watchdog = new Watchdog(Watchdog::NOTICE);
    self::assertTrue($watchdog->is(5));
    $watchdog = new Watchdog(Watchdog::INFO);
    self::assertTrue($watchdog->is(6));
    $watchdog = new Watchdog(Watchdog::DEBUG);
    self::assertTrue($watchdog->is(7));
    new Watchdog(8);
  }

  public function testFromLevel() {
    $watchdog = new WatchdogFromLevel(LogLevel::EMERGENCY());
    self::assertEquals(0, $watchdog->value());
    $watchdog = new WatchdogFromLevel(LogLevel::ALERT());
    self::assertEquals(1, $watchdog->value());
    $watchdog = new WatchdogFromLevel(LogLevel::CRITICAL());
    self::assertEquals(2, $watchdog->value());
    $watchdog = new WatchdogFromLevel(LogLevel::ERROR());
    self::assertEquals(3, $watchdog->value());
    $watchdog = new WatchdogFromLevel(LogLevel::WARNING());
    self::assertEquals(4, $watchdog->value());
    $watchdog = new WatchdogFromLevel(LogLevel::NOTICE());
    self::assertEquals(5, $watchdog->value());
    $watchdog = new WatchdogFromLevel(LogLevel::INFO());
    self::assertEquals(6, $watchdog->value());
    $watchdog = new WatchdogFromLevel(LogLevel::DEBUG());
    self::assertEquals(7, $watchdog->value());
  }

  public function testWatchdog() {
    $watchdog = new WatchdogLogRecord(new ErrorLogRecord('xdruple', new MessageWithTokens('Error: {log}', [
      'log' => 'log record',
    ])));
    self::assertEquals('xdruple', $watchdog->type());
    self::assertEquals('Error: {log}', $watchdog->message());
    self::assertEquals([
      '!log' => 'log record',
      'details' => null,
    ], $watchdog->variables());
    self::assertEquals(Watchdog::ERROR, $watchdog->severity());
  }
}

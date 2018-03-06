<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Level;

use PHPUnit\Framework\TestCase;

class LogLevelTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Value `panic` is not supported
   * @throws \Throwable
   */
  public function testLogLevel() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $level = new LogLevel(LogLevel::INFO);
    self::assertEquals('info', $level->value());
    self::assertTrue($level->is(LogLevel::INFO));
    self::assertFalse($level->is(LogLevel::DEBUG));
    $level = LogLevel::EMERGENCY();
    self::assertEquals('emergency', $level->value());
    self::assertTrue($level->is(LogLevel::EMERGENCY));
    $level = LogLevel::ALERT();
    self::assertEquals('alert', $level->value());
    self::assertTrue($level->is(LogLevel::ALERT));
    $level = LogLevel::CRITICAL();
    self::assertEquals('critical', $level->value());
    self::assertTrue($level->is(LogLevel::CRITICAL));
    $level = LogLevel::ERROR();
    self::assertEquals('error', $level->value());
    self::assertTrue($level->is(LogLevel::ERROR));
    $level = LogLevel::WARNING();
    self::assertEquals('warning', $level->value());
    self::assertTrue($level->is(LogLevel::WARNING));
    $level = LogLevel::NOTICE();
    self::assertEquals('notice', $level->value());
    self::assertTrue($level->is(LogLevel::NOTICE));
    $level = LogLevel::INFO();
    self::assertEquals('info', $level->value());
    self::assertTrue($level->is(LogLevel::INFO));
    $level = LogLevel::DEBUG();
    self::assertEquals('debug', $level->value());
    self::assertTrue($level->is(LogLevel::DEBUG));
    new LogLevel('panic');
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Message\Collection\Sequence\ArrayListMessage;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\AlertLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\CriticalLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\DebugLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\EmergencyLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\ErrorLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\InfoLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\NoticeLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\WarningLogRecord;

class LogRecordTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testStruct() {
    $record = new LogRecordStruct(
      'xdruple',
      LogLevel::INFO(),
      new StringMessage('Test log record'),
      null,
      new ArrayListMessage([
        new StringMessage('Log record added'),
      ])
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::INFO));
    self::assertEquals('Test log record', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Log record added', (string) $record->notifications()->get(0));
  }

  public function testLevels() {
    $record = new EmergencyLogRecord(
      'xdruple', new StringMessage('Emergency log'), null, new StringMessage('Emergency notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::EMERGENCY));
    self::assertEquals('Emergency log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Emergency notification', (string) $record->notifications()->get(0));
    $record = new AlertLogRecord(
      'xdruple', new StringMessage('Alert log'), null, new StringMessage('Alert notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::ALERT));
    self::assertEquals('Alert log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Alert notification', (string) $record->notifications()->get(0));
    $record = new CriticalLogRecord(
      'xdruple', new StringMessage('Critical log'), null, new StringMessage('Critical notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::CRITICAL));
    self::assertEquals('Critical log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Critical notification', (string) $record->notifications()->get(0));
    $record = new ErrorLogRecord(
      'xdruple', new StringMessage('Error log'), null, new StringMessage('Error notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::ERROR));
    self::assertEquals('Error log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Error notification', (string) $record->notifications()->get(0));
    $record = new WarningLogRecord(
      'xdruple', new StringMessage('Warning log'), null, new StringMessage('Warning notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::WARNING));
    self::assertEquals('Warning log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Warning notification', (string) $record->notifications()->get(0));
    $record = new NoticeLogRecord(
      'xdruple', new StringMessage('Notice log'), null, new StringMessage('Notice notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::NOTICE));
    self::assertEquals('Notice log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Notice notification', (string) $record->notifications()->get(0));
    $record = new InfoLogRecord(
      'xdruple', new StringMessage('Info log'), null, new StringMessage('Info notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::INFO));
    self::assertEquals('Info log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Info notification', (string) $record->notifications()->get(0));
    $record = new DebugLogRecord(
      'xdruple', new StringMessage('Debug log'), null, new StringMessage('Debug notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::DEBUG));
    self::assertEquals('Debug log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Debug notification', (string) $record->notifications()->get(0));
  }
}

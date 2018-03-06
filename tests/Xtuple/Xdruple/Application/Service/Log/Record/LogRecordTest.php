<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record;

use PHPUnit\Framework\TestCase;
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
  public function testStruct() {
    $record = new LogRecordStruct(
      'xdruple',
      LogLevel::INFO(),
      new StringMessage('Test log record'),
      null,
      new StringMessage('Log record added')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::INFO));
    self::assertEquals('Test log record', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Log record added', $record->notification()->__toString());
  }

  public function testLevels() {
    $record = new EmergencyLogRecord(
      'xdruple', new StringMessage('Emergency log'), null, new StringMessage('Emergency notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::EMERGENCY));
    self::assertEquals('Emergency log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Emergency notification', $record->notification()->__toString());
    $record = new AlertLogRecord(
      'xdruple', new StringMessage('Alert log'), null, new StringMessage('Alert notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::ALERT));
    self::assertEquals('Alert log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Alert notification', $record->notification()->__toString());
    $record = new CriticalLogRecord(
      'xdruple', new StringMessage('Critical log'), null, new StringMessage('Critical notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::CRITICAL));
    self::assertEquals('Critical log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Critical notification', $record->notification()->__toString());
    $record = new ErrorLogRecord(
      'xdruple', new StringMessage('Error log'), null, new StringMessage('Error notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::ERROR));
    self::assertEquals('Error log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Error notification', $record->notification()->__toString());
    $record = new WarningLogRecord(
      'xdruple', new StringMessage('Warning log'), null, new StringMessage('Warning notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::WARNING));
    self::assertEquals('Warning log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Warning notification', $record->notification()->__toString());
    $record = new NoticeLogRecord(
      'xdruple', new StringMessage('Notice log'), null, new StringMessage('Notice notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::NOTICE));
    self::assertEquals('Notice log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Notice notification', $record->notification()->__toString());
    $record = new InfoLogRecord(
      'xdruple', new StringMessage('Info log'), null, new StringMessage('Info notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::INFO));
    self::assertEquals('Info log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Info notification', $record->notification()->__toString());
    $record = new DebugLogRecord(
      'xdruple', new StringMessage('Debug log'), null, new StringMessage('Debug notification')
    );
    self::assertEquals('xdruple', $record->type());
    self::assertTrue($record->level()->is(LogLevel::DEBUG));
    self::assertEquals('Debug log', $record->message()->__toString());
    self::assertNull($record->details());
    self::assertEquals('Debug notification', $record->notification()->__toString());
  }
}

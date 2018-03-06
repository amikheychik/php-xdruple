<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\DebugLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Level\InfoLogRecord;

class LogTest
  extends TestCase {
  public function testLog() {
    $log = new TestLog();
    self::assertTrue($log->isEmpty());
    self::assertEquals(0, $log->count());
    self::assertNull($log->get(0));
    $log->log(new DebugLogRecord('xdruple', new StringMessage('First record'), null, new StringMessage('Notify')));
    self::assertFalse($log->isEmpty());
    self::assertEquals(1, $log->count());
    self::assertEquals('xdruple', $log->get(0)->type());
    self::assertTrue($log->get(0)->level()->is(LogLevel::DEBUG));
    self::assertEquals('First record', $log->get(0)->message()->__toString());
    self::assertEquals('Notify', $log->get(0)->notification()->__toString());
    $log->log(new InfoLogRecord('xdruple', new StringMessage('Second record')));
    self::assertEquals('xdruple', $log->get(1)->type());
    self::assertTrue($log->get(1)->level()->is(LogLevel::INFO));
    self::assertEquals('Second record', $log->get(1)->message()->__toString());
    $records = ['First record', 'Second record'];
    foreach ($log as $i => $record) {
      self::assertEquals($records[$i], $record->message()->__toString());
    }
  }
}

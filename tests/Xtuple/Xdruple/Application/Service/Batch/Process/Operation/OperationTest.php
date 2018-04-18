<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ArrayListOperation;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ListOperation;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Progress\Progress;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Progress\ProgressStruct;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecordStruct;

class OperationTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testAbstract() {
    $initial = [
      'completed' => 0,
      'total' => 10,
    ];
    $operation = new TestOperation('xdruple', $initial);
    self::assertEquals('xdruple', $operation->id());
    self::assertEquals(['completed' => 0, 'total' => 10], $operation->initial());
    $sandbox = [
      'progress' => new ProgressStruct(1, 10),
    ];
    $progress = $operation->run($sandbox);
    self::assertEquals(1, $progress->completed());
    self::assertEquals(10, $progress->total());
    self::assertNull($progress->message());
    $log = $operation->success([
      'log' => new LogRecordStruct('xdruple.batch', LogLevel::DEBUG(), new StringMessage('Completed'), null, null),
    ]);
    self::assertEquals('xdruple.batch', $log->type());
    self::assertEquals('debug', $log->level()->value());
    self::assertEquals('Completed', (string) $log->message());
    self::assertNull($log->details());
    self::assertNull($log->notification());
    $log = $operation->failure([
      'failure' => new LogRecordStruct('xdruple.batch', LogLevel::DEBUG(), new StringMessage('Failed'), null, null),
    ], new ArrayListOperation());
    self::assertEquals('xdruple.batch', $log->type());
    self::assertEquals('debug', $log->level()->value());
    self::assertEquals('Failed', (string) $log->message());
    self::assertNull($log->details());
    self::assertNull($log->notification());
  }
}

final class TestOperation
  extends AbstractOperation {
  /** @var array */
  private $initial;

  public function __construct(string $id, array $initial) {
    parent::__construct($id);
    $this->initial = $initial;
  }

  public function initial(): array {
    return $this->initial;
  }

  public function run(array &$sandbox): Progress {
    return $sandbox['progress'];
  }

  public function success(array $results): LogRecord {
    return $results['log'];
  }

  public function failure(array $results, ListOperation $unfinished): LogRecord {
    return $results['failure'];
  }
}

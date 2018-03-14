<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Collection\ArrayListCSS;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\CSSStruct;
use Xtuple\Xdruple\Application\Service\Batch\Drupal\DrupalBatchFunctionsStatic;
use Xtuple\Xdruple\Application\Service\Batch\Process\Messages\MessagesStruct;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\AbstractOperation;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ArrayListOperation;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ListOperation;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Progress\Progress;
use Xtuple\Xdruple\Application\Service\Batch\Process\ProcessStruct;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;

class BatchTest
  extends TestCase {
  public function testBatch() {
    $batch = new TestBatch();
    $batch->set(new ProcessStruct(new ArrayListOperation()));
    self::assertEmpty(DrupalBatchFunctionsStatic::$batches['sets'][0]['operations']);
    self::assertArrayNotHasKey('title', DrupalBatchFunctionsStatic::$batches['sets'][0]);
    self::assertArrayNotHasKey('init_message', DrupalBatchFunctionsStatic::$batches['sets'][0]);
    self::assertArrayNotHasKey('progress_message', DrupalBatchFunctionsStatic::$batches['sets'][0]);
    self::assertArrayNotHasKey('error_message', DrupalBatchFunctionsStatic::$batches['sets'][0]);
    self::assertArrayNotHasKey('css', DrupalBatchFunctionsStatic::$batches['sets'][0]);
    self::assertArrayNotHasKey('url_options', DrupalBatchFunctionsStatic::$batches['sets'][0]);
    $operation = new TestOperation('xdruple', []);
    $batch->set(new ProcessStruct(new ArrayListOperation([
      $operation,
    ]), new StringMessage('Test process'), new MessagesStruct(
      new StringMessage('Init message'),
      new StringMessage('Progress message'),
      new StringMessage('Error message')
    ), new ArrayListCSS([
      new CSSStruct('test.css'),
    ]), [
      'fragment' => 'test',
    ]));
    self::assertEquals([
      'xdruple',
      $operation,
    ], DrupalBatchFunctionsStatic::$batches['sets'][1]['operations'][0]);
    self::assertEquals('Test process', DrupalBatchFunctionsStatic::$batches['sets'][1]['title']);
    self::assertEquals('Init message', DrupalBatchFunctionsStatic::$batches['sets'][1]['init_message']);
    self::assertEquals('Progress message', DrupalBatchFunctionsStatic::$batches['sets'][1]['progress_message']);
    self::assertEquals('Error message', DrupalBatchFunctionsStatic::$batches['sets'][1]['error_message']);
    self::assertEquals([
      'test.css',
    ], DrupalBatchFunctionsStatic::$batches['sets'][1]['css']);
    self::assertEquals([
      'fragment' => 'test',
    ], DrupalBatchFunctionsStatic::$batches['sets'][1]['url_options']);
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

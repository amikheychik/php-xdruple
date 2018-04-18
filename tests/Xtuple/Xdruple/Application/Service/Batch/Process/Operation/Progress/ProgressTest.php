<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Progress;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Argument\Collection\Map\ArrayMapArgument;
use Xtuple\Util\Type\String\Message\Message\MessageStruct;
use Xtuple\Util\Type\String\Message\Type\Number\Percent\PercentArgument;

class ProgressTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testStruct() {
    $progress = new ProgressStruct(0, 0);
    self::assertEquals(0, $progress->completed());
    self::assertEquals(0, $progress->total());
    self::assertNull($progress->message());
    $progress = new ProgressStruct(1, 10, new MessageStruct('{completed} completed', new ArrayMapArgument([
      new PercentArgument('completed', 1 / 10),
    ])));
    self::assertEquals(1, $progress->completed());
    self::assertEquals(10, $progress->total());
    self::assertEquals('10% completed', (string) $progress->message());
  }
}

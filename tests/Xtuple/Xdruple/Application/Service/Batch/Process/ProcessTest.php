<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Collection\ArrayListCSS;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\CSSStruct;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroupDefault;
use Xtuple\Xdruple\Application\Service\Batch\Process\Messages\MessagesStruct;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ArrayListOperation;

class ProcessTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testStruct() {
    $process = new ProcessStruct(new ArrayListOperation());
    self::assertTrue($process->operations()->isEmpty());
    self::assertNull($process->title());
    self::assertNull($process->messages()->init());
    self::assertNull($process->messages()->progress());
    self::assertNull($process->messages()->error());
    self::assertTrue($process->css()->isEmpty());
    self::assertEquals([], $process->urlOptions());
    $process = new ProcessStruct(new ArrayListOperation(), new StringMessage('Test process'), new MessagesStruct(
      new StringMessage('Init message')
    ), new ArrayListCSS([
      new CSSStruct('test.css', ['group' => (new CSSGroupDefault())->weight()]),
    ]), [
      'fragment' => 'test',
    ]);
    self::assertEquals('Test process', (string) $process->title());
    self::assertEquals('Init message', $process->messages()->init());
    self::assertEquals('test.css', $process->css()->get(0)->data());
    self::assertEquals([
      'group' => 0,
    ], $process->css()->get(0)->options());
    self::assertEquals([
      'fragment' => 'test',
    ], $process->urlOptions());
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Messages;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;

class MessagesTest
  extends TestCase {
  public function testStruct() {
    $messages = new MessagesStruct();
    self::assertNull($messages->init());
    self::assertNull($messages->progress());
    self::assertNull($messages->error());
    $messages = new MessagesStruct(
      new StringMessage('Initial message'),
      new StringMessage('Progress message'),
      new StringMessage('Error message')
    );
    self::assertEquals('Initial message', (string) $messages->init());
    self::assertEquals('Progress message', (string) $messages->progress());
    self::assertEquals('Error message', (string) $messages->error());
  }
}

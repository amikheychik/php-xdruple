<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Map;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessageStruct;

class MapMailMessageTest
  extends TestCase {
  public function testAbstract() {
    $messages = new TestEmails();
    self::assertEquals(2, $messages->count());
    self::assertFalse($messages->isEmpty());
    self::assertEquals('mail@example.com', $messages->get('xdruple')->to());
    self::assertEquals('test@example.com', $messages->get('xdruple_test')->to());
  }
}

final class TestEmails
  extends AbstractMapMailMessage {
  public function __construct() {
    /** @noinspection PhpUnhandledExceptionInspection - verified Message type */
    parent::__construct(new ArrayMapMailMessage([
      new MailMessageStruct('xdruple', null, 'test@example.com', 'Test email', 'Test email body'),
      new MailMessageStruct('xdruple', null, 'mail@example.com', 'Test', 'Test email'),
      new MailMessageStruct('xdruple_test', null, 'test@example.com', 'Test email', 'Test email body'),
    ]));
  }
}

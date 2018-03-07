<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Locale\Language\Variable\LanguageDefaultVariable;
use Xtuple\Xdruple\Application\Service\Variable\TestVariable;

class MailMessageTest
  extends TestCase {
  public function testStruct() {
    $message = new MailMessageStruct('xdruple', null, 'mail@example.com', 'Test', 'Test email body');
    self::assertEquals('xdruple', $message->key());
    self::assertNull($message->from());
    self::assertEquals('mail@example.com', $message->to());
    self::assertEquals('Test', $message->subject());
    self::assertEquals('Test email body', $message->body());
    self::assertNull($message->language());
    self::assertEquals([], $message->params());
    self::assertTrue($message->send());
    $message = new TestMessage();
    self::assertEquals('xdruple', $message->key());
    self::assertEquals('test@example.com', $message->from());
    self::assertEquals('mail@example.com', $message->to());
    self::assertEquals('Test', $message->subject());
    self::assertEquals('Test email body', $message->body());
    self::assertEquals('en', $message->language()->language());
    self::assertEquals(['id' => 1], $message->params());
    self::assertFalse($message->send());
  }
}

final class TestMessage
  extends AbstractMailMessage {
  public function __construct() {
    parent::__construct(new MailMessageStruct(
      'xdruple',
      'test@example.com',
      'mail@example.com',
      'Test',
      'Test email body',
      new LanguageDefaultVariable(new TestVariable()),
      [
        'id' => 1,
      ],
      false
    ));
  }
}

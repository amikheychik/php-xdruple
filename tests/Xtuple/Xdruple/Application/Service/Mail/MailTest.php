<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessageStruct;

class MailTest
  extends TestCase {
  public function testMail() {
    $mail = new TestMail();
    self::assertTrue($mail->isEmpty());
    self::assertEquals(0, $mail->count());
    $mail->send(new MailMessageStruct('xdruple', null, 'test@example.com', 'Subject', 'Test body'));
    self::assertFalse($mail->isEmpty());
    self::assertEquals(1, $mail->count());
    $mail->send(new MailMessageStruct('xdruple', null, 'test@example.com', 'Subject', 'Test body'));
    self::assertEquals(2, $mail->count());
    self::assertEquals('test@example.com', $mail->get(1)->to());
    $mail->send(new MailMessageStruct('xdruple', null, 'mail@example.com', 'Subject', 'Test body'));
    self::assertEquals('mail@example.com', $mail->get(2)->to());
    $mail->send(new MailMessageStruct('xdruple', null, '', 'Subject', 'Test body'));
    $to = [
      'test@example.com',
      'test@example.com',
      'mail@example.com',
    ];
    foreach ($mail as $i => $message) {
      self::assertEquals($to[$i], $message->to());
    }
  }
}

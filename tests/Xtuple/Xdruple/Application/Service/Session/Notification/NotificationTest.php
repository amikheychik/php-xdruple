<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Message\MessageWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\NotificationType;

class NotificationTest
  extends TestCase {
  public function testStruct() {
    $notification = new NotificationStruct(NotificationType::ERROR(), new MessageWithTokens('Notification: !error', [
      '!error' => 'error notification',
    ]));
    self::assertTrue($notification->type()->isError());
    self::assertEquals('Notification: !error', $notification->message()->template());
    self::assertEquals('error notification', $notification->message()->arguments()->get('!error'));
  }
}

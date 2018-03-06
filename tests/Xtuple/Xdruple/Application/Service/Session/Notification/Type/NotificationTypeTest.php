<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Type;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Message\MessageWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\ErrorNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\ErrorNotificationWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\InfoNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\InfoNotificationWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\StatusNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\StatusNotificationWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\WarningNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\WarningNotificationWithTokens;

class NotificationTypeTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Value `debug` is not supported
   * @throws \Throwable
   */
  public function testType() {
    $type = NotificationType::ERROR();
    self::assertEquals('error', $type->value());
    self::assertTrue($type->is(NotificationType::ERROR));
    self::assertTrue($type->isError());
    $type = NotificationType::INFO();
    self::assertEquals('info', $type->value());
    self::assertTrue($type->is(NotificationType::INFO));
    self::assertTrue($type->isInfo());
    $type = NotificationType::STATUS();
    self::assertEquals('status', $type->value());
    self::assertTrue($type->is(NotificationType::STATUS));
    self::assertTrue($type->isStatus());
    $type = NotificationType::WARNING();
    self::assertEquals('warning', $type->value());
    self::assertTrue($type->is(NotificationType::WARNING));
    self::assertTrue($type->isWarning());
    self::assertFalse($type->is(NotificationType::INFO));
    self::assertFalse($type->isInfo());
    new NotificationType('debug');
  }

  public function testNotification() {
    $notification = new ErrorNotification(new MessageWithTokens('Notification: !error', [
      '!error' => 'Page not found',
    ]));
    self::assertTrue($notification->type()->is(NotificationType::ERROR));
    self::assertEquals('Notification: !error', $notification->message()->template());
    $notification = new ErrorNotificationWithTokens('Notification: !error', [
      '!error' => 'Access denied',
    ]);
    self::assertTrue($notification->type()->is(NotificationType::ERROR));
    self::assertEquals('Notification: !error', $notification->message()->template());
    $notification = new InfoNotification(new MessageWithTokens('Notification: !info', [
      '!info' => 'Page not found',
    ]));
    self::assertTrue($notification->type()->is(NotificationType::INFO));
    self::assertEquals('Notification: !info', $notification->message()->template());
    $notification = new InfoNotificationWithTokens('Notification: !info', [
      '!info' => 'Access denied',
    ]);
    self::assertTrue($notification->type()->is(NotificationType::INFO));
    self::assertEquals('Notification: !info', $notification->message()->template());
    $notification = new StatusNotification(new MessageWithTokens('Notification: !info', [
      '!info' => 'Page not found',
    ]));
    self::assertTrue($notification->type()->is(NotificationType::STATUS));
    self::assertEquals('Notification: !info', $notification->message()->template());
    $notification = new StatusNotificationWithTokens('Notification: !info', [
      '!info' => 'Access denied',
    ]);
    self::assertTrue($notification->type()->is(NotificationType::STATUS));
    self::assertEquals('Notification: !info', $notification->message()->template());
    $notification = new WarningNotification(new MessageWithTokens('Notification: !info', [
      '!info' => 'Page not found',
    ]));
    self::assertTrue($notification->type()->is(NotificationType::WARNING));
    self::assertEquals('Notification: !info', $notification->message()->template());
    $notification = new WarningNotificationWithTokens('Notification: !info', [
      '!info' => 'Access denied',
    ]);
    self::assertTrue($notification->type()->is(NotificationType::WARNING));
    self::assertEquals('Notification: !info', $notification->message()->template());
  }
}

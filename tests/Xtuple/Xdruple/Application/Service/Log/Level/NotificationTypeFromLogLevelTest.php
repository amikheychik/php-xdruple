<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Level;

use PHPUnit\Framework\TestCase;

class NotificationTypeFromLogLevelTest
  extends TestCase {
  public function testNotificationType() {
    $type = new NotificationTypeFromLogLevel(LogLevel::EMERGENCY());
    self::assertTrue($type->type()->isError());
    $type = new NotificationTypeFromLogLevel(LogLevel::ALERT());
    self::assertTrue($type->type()->isError());
    $type = new NotificationTypeFromLogLevel(LogLevel::CRITICAL());
    self::assertTrue($type->type()->isError());
    $type = new NotificationTypeFromLogLevel(LogLevel::ERROR());
    self::assertTrue($type->type()->isError());
    $type = new NotificationTypeFromLogLevel(LogLevel::WARNING());
    self::assertTrue($type->type()->isWarning());
    $type = new NotificationTypeFromLogLevel(LogLevel::NOTICE());
    self::assertTrue($type->type()->isWarning());
    $type = new NotificationTypeFromLogLevel(LogLevel::INFO());
    self::assertTrue($type->type()->isInfo());
    $type = new NotificationTypeFromLogLevel(LogLevel::DEBUG());
    self::assertTrue($type->type()->isInfo());
  }
}

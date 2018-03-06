<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Level;

use Xtuple\Xdruple\Application\Service\Session\Notification\Type\NotificationType;

final class NotificationTypeFromLogLevel {
  private const LEVELS = [
    LogLevel::ALERT => NotificationType::ERROR,
    LogLevel::CRITICAL => NotificationType::ERROR,
    LogLevel::DEBUG => NotificationType::INFO,
    LogLevel::EMERGENCY => NotificationType::ERROR,
    LogLevel::ERROR => NotificationType::ERROR,
    LogLevel::INFO => NotificationType::INFO,
    LogLevel::NOTICE => NotificationType::WARNING,
    LogLevel::WARNING => NotificationType::WARNING,
  ];
  /** @var LogLevel */
  private $level;

  public function __construct(LogLevel $level) {
    $this->level = $level;
  }

  public function type(): NotificationType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new NotificationType(
      self::LEVELS[$this->level->value()] ?? NotificationType::INFO
    );
  }
}

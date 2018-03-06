<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Type;

use Xtuple\Util\Enum\Char\StringEnum;

final class NotificationType
  extends StringEnum {
  public const ERROR = 'error';
  public const WARNING = 'warning';
  public const STATUS = 'status';
  public const INFO = 'info';

  public static function ERROR(): NotificationType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::ERROR);
  }

  public static function WARNING(): NotificationType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::WARNING);
  }

  public static function STATUS(): NotificationType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::STATUS);
  }

  public static function INFO(): NotificationType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::INFO);
  }

  public function isError(): bool {
    return $this->is(NotificationType::ERROR);
  }

  public function isWarning(): bool {
    return $this->is(NotificationType::WARNING);
  }

  public function isStatus(): bool {
    return $this->is(NotificationType::STATUS);
  }

  public function isInfo(): bool {
    return $this->is(NotificationType::INFO);
  }
}

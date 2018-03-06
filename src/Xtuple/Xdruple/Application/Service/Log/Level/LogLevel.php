<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Level;

use Xtuple\Util\Enum\Char\StringEnum;

final class LogLevel
  extends StringEnum {
  // System is unusable
  public const EMERGENCY = 'emergency';
  // Action must be taken immediately
  public const ALERT = 'alert';
  // Functionality is affected
  public const CRITICAL = 'critical';
  // An error condition exists and functionality could be affected
  public const ERROR = 'error';
  // Functionality could be affected
  public const WARNING = 'warning';
  // Normal but significant condition
  public const NOTICE = 'notice';
  // General information about system operations
  public const INFO = 'info';
  // Debug-level messages
  public const DEBUG = 'debug';

  public static function EMERGENCY(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::EMERGENCY);
  }

  public static function ALERT(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::ALERT);
  }

  public static function CRITICAL(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::CRITICAL);
  }

  public static function ERROR(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::ERROR);
  }

  public static function WARNING(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::WARNING);
  }

  public static function NOTICE(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::NOTICE);
  }

  public static function INFO(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::INFO);
  }

  public static function DEBUG(): LogLevel {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::DEBUG);
  }
}

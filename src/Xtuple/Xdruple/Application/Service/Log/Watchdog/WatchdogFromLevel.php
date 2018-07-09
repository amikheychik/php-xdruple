<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Watchdog;

use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;

final class WatchdogFromLevel {
  /** @var int[] */
  private const SEVERITIES = [
    LogLevel::ALERT => Watchdog::ALERT,
    LogLevel::CRITICAL => Watchdog::CRITICAL,
    LogLevel::DEBUG => Watchdog::DEBUG,
    LogLevel::EMERGENCY => Watchdog::EMERGENCY,
    LogLevel::ERROR => Watchdog::ERROR,
    LogLevel::INFO => Watchdog::INFO,
    LogLevel::NOTICE => Watchdog::NOTICE,
    LogLevel::WARNING => Watchdog::WARNING,
  ];
  /** @var LogLevel */
  private $level;

  public function __construct(LogLevel $level) {
    $this->level = $level;
  }

  public function value(): int {
    return self::SEVERITIES[$this->level->value()] ?? Watchdog::ERROR;
  }
}

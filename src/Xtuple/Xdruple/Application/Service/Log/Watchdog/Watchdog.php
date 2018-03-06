<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Watchdog;

use Xtuple\Util\Enum\Integer\IntegerEnum;

final class Watchdog
  extends IntegerEnum {
  public const EMERGENCY = 0;
  public const ALERT = 1;
  public const CRITICAL = 2;
  public const ERROR = 3;
  public const WARNING = 4;
  public const NOTICE = 5;
  public const INFO = 6;
  public const DEBUG = 7;
}

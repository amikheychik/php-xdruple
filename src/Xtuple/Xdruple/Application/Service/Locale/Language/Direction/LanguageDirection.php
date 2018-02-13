<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language\Direction;

use Xtuple\Util\Enum\Integer\IntegerEnum;

final class LanguageDirection
  extends IntegerEnum {
  public const LTR = 0;
  public const RTL = 1;

  public static function LTR(): LanguageDirection {
    return new self(self::LTR);
  }

  public static function RTL(): LanguageDirection {
    return new self(self::RTL);
  }

  public function isLTR(): bool {
    return $this->is(self::LTR);
  }

  public function isRTL(): bool {
    return $this->is(self::RTL);
  }
}

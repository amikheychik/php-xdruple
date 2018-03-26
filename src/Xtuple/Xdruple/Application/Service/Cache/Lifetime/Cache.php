<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Lifetime;

use Xtuple\Util\Enum\Integer\IntegerEnum;

final class Cache
  extends IntegerEnum {
  /** @see CACHE_PERMANENT */
  public const PERMANENT = 0;
  /** @see CACHE_TEMPORARY */
  public const TEMPORARY = -1;

  public static function PERMANENT(): Cache {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::PERMANENT);
  }

  public static function TEMPORARY(): Cache {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::TEMPORARY);
  }

  public function isPermanent(): bool {
    return $this->is(self::PERMANENT);
  }

  public function isTemporary(): bool {
    return $this->is(self::TEMPORARY);
  }
}

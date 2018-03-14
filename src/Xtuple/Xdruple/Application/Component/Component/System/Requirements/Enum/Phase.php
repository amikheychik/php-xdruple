<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Requirements\Enum;

use Xtuple\Util\Enum\Char\StringEnum;

/**
 * @see hook_requirements()
 */
final class Phase
  extends StringEnum {
  public const INSTALL = 'install';
  public const UPDATE = 'update';
  public const RUNTIME = 'runtime';

  public static function INSTALL(): Phase {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::INSTALL);
  }

  public static function UPDATE(): Phase {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::UPDATE);
  }

  public static function RUNTIME(): Phase {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::RUNTIME);
  }

  public function isInstall(): bool {
    return $this->is(self::INSTALL);
  }

  public function isUpdate(): bool {
    return $this->is(self::UPDATE);
  }

  public function isRuntime(): bool {
    return $this->is(self::RUNTIME);
  }
}

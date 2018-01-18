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

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Type;

use Xtuple\Util\Enum\Char\StringEnum;

final class Type
  extends StringEnum {
  public const ENGINE = 'theme_engine';
  public const LIBRARY = 'library';
  public const MODULE = 'module';
  public const PROFILE = 'profile';
  public const THEME = 'theme';

  public static function ENGINE(): Type {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::ENGINE);
  }

  public static function LIBRARY(): Type {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::LIBRARY);
  }

  public static function MODULE(): Type {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::MODULE);
  }

  public static function PROFILE(): Type {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::PROFILE);
  }

  public static function THEME(): Type {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::THEME);
  }

  public function isEngine(): bool {
    return $this->is(self::ENGINE);
  }

  public function isLibrary(): bool {
    return $this->is(self::LIBRARY);
  }

  public function isModule(): bool {
    return $this->is(self::MODULE);
  }

  public function isProfile(): bool {
    return $this->is(self::PROFILE);
  }

  public function isTheme(): bool {
    return $this->is(self::THEME);
  }
}

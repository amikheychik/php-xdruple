<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment\Type;

use Xtuple\Util\Enum\Char\StringEnum;

final class EnvironmentType
  extends StringEnum {
  public const DEVELOPMENT = 'development';
  public const STAGE = 'stage';
  public const PRODUCTION = 'production';

  public static function DEVELOPMENT(): EnvironmentType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::DEVELOPMENT);
  }

  public static function STAGE(): EnvironmentType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::STAGE);
  }

  public static function PRODUCTION(): EnvironmentType {
    /** @noinspection PhpUnhandledExceptionInspection */
    return new self(self::PRODUCTION);
  }

  public function isDevelopment(): bool {
    return $this->is(self::DEVELOPMENT);
  }

  public function isStage(): bool {
    return $this->is(self::STAGE);
  }

  public function isProduction(): bool {
    return $this->is(self::PRODUCTION);
  }
}

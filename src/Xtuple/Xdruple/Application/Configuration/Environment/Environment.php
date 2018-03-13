<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

use Xtuple\Xdruple\Application\Configuration\Configuration;
use Xtuple\Xdruple\Application\Configuration\Environment\Databases\Databases;
use Xtuple\Xdruple\Application\Configuration\Environment\Type\EnvironmentType;

interface Environment
  extends Configuration {
  public function type(): EnvironmentType;

  public function databases(): Databases;

  public function value(): array;
}

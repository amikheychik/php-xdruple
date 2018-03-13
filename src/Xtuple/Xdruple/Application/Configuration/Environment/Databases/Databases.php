<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment\Databases;

use Xtuple\Xdruple\Application\Service\Configuration\Value\Value;

interface Databases
  extends Value {
  /**
   * @return array
   */
  public function value();
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Variable;

interface Variable {
  /**
   * @return mixed
   */
  public function value();
}

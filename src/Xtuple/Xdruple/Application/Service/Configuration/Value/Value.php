<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value;

interface Value {
  /**
   * @return mixed
   */
  public function value();
}

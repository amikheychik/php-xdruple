<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value\XML;

use Xtuple\Util\XML\Element\XMLElement;
use Xtuple\Xdruple\Application\Service\Configuration\Value\Value;

interface XMLValue
  extends Value {
  public function xml(): ?XMLElement;

  /**
   * @return string
   */
  public function value();
}

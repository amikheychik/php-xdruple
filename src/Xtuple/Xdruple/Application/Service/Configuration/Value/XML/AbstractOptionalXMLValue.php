<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value\XML;

use Xtuple\Util\XML\Element\XMLElement;

abstract class AbstractOptionalXMLValue
  implements XMLValue {
  /** @var null|XMLValue */
  private $value;

  public function __construct(?XMLValue $value) {
    $this->value = $value;
  }

  public final function isPresent(): bool {
    return $this->value !== null;
  }

  public final function xml(): ?XMLElement {
    return $this->value
      ? $this->value->xml()
      : null;
  }

  public final function value() {
    return $this->value
      ? $this->value->value()
      : '';
  }
}

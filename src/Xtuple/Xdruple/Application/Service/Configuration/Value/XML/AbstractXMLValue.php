<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value\XML;

use Xtuple\Util\XML\Element\XMLElement;

abstract class AbstractXMLValue
  implements XMLValue {
  /** @var XMLValue */
  private $xml;

  public function __construct(XMLValue $xml) {
    $this->xml = $xml;
  }

  public final function xml(): ?XMLElement {
    return $this->xml->xml();
  }

  public final function value() {
    return $this->xml->value();
  }
}

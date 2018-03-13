<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value\XML;

use Xtuple\Util\XML\Element\XMLElement;

final class XMLValueStruct
  implements XMLValue {
  /** @var null|XMLElement */
  private $xml;

  public function __construct(?XMLElement $xml) {
    $this->xml = $xml;
  }

  public function xml(): ?XMLElement {
    return $this->xml;
  }

  public function value() {
    return (string) $this->xml;
  }
}

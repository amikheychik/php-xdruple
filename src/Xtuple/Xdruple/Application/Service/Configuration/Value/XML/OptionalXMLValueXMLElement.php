<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value\XML;

use Xtuple\Util\XML\Element\XMLElement;

final class OptionalXMLValueXMLElement
  extends AbstractOptionalXMLValue {
  public function __construct(?XMLElement $element) {
    try {
      $value = $element ? new XMLValueXMLElement($element) : null;
    }
    catch (\Throwable $e) {
      $value = null;
    }
    parent::__construct($value);
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration;

use Xtuple\Util\XML\Element\Type\Dictionary\ArrayXMLElement;
use Xtuple\Util\XML\Element\XMLElement;
use Xtuple\Xdruple\Application\Service\Configuration\Value\XML\OptionalXMLValueXMLElement;

final class ConfigurationXMLElement
  extends AbstractConfiguration {
  public function __construct(XMLElement $element) {
    $configuration = [];
    /** @var XMLElement $variable */
    foreach ($element->children("/{$element->name()}/variable") as $variable) {
      $name = $variable->attributes()->get('name')->value();
      $value = new OptionalXMLValueXMLElement($variable);
      if ($value->isPresent()) {
        $configuration[$name] = $value->value();
      }
      else {
        $value = (new ArrayXMLElement($variable))->value();
        if (is_string($value) && defined($value)) {
          $value = constant($value);
        }
        $configuration[$name] = $value;
      }
    }
    parent::__construct(new ConfigurationStruct($configuration));
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

use Xtuple\Util\XML\Element\Type\ArrayXMLElement;
use Xtuple\Util\XML\Element\XMLElement;
use Xtuple\Xdruple\Application\Configuration\Variable\Drupal\DatabasesConfiguration;

final class EnvironmentXMLElement
  extends AbstractEnvironment {
  public function __construct(XMLElement $environment, DatabasesConfiguration $databases) {
    $configuration = [];
    foreach ($environment->children('/environment/configuration/variable') as $variable) {
      $configuration[$variable->attribute('name')->value()] = (new ArrayXMLElement($variable))->value();
    }
    parent::__construct(new EnvironmentArray([
        'databases' => $databases->value(),
        'environment' => $environment->children('/environment')->get(0)->attribute('type')->value(),
      ] + $configuration));
  }
}

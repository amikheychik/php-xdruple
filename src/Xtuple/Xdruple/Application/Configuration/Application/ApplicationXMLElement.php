<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Application;

use Xtuple\Util\XML\Element\XMLElement;
use Xtuple\Xdruple\Application\Configuration\ConfigurationXMLElement;

final class ApplicationXMLElement
  extends AbstractApplication {
  public function __construct(XMLElement $application) {
    parent::__construct(new ApplicationStruct(
      ($configuration = $application->children('/application/configuration')->get(0))
        ? (new ConfigurationXMLElement($configuration))->value()
        : []
    ));
  }
}

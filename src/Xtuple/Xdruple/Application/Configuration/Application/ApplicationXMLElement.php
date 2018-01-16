<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Application;

use Xtuple\Util\XML\Element\XMLElement;

final class ApplicationXMLElement
  implements Application {
  /** @var XMLElement */
  private $application;

  public function __construct(XMLElement $application) {
    $this->application = $application;
  }
}

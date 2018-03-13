<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Loader;

use Xtuple\Util\XML\Element\XMLElement;
use Xtuple\Xdruple\Application\Application;
use Xtuple\Xdruple\Application\Configuration\Environment\Databases\Databases;

final class ApplicationXMLLoader
  implements ApplicationLoader {
  /** @var XMLElement */
  private $application;
  /** @var XMLElement */
  private $environment;
  /** @var array */
  private $databases;

  public function __construct(XMLElement $application, XMLElement $environment, Databases $databases) {
    $this->application = $application;
    $this->environment = $environment;
    $this->databases = $databases;
  }

  public function application(): Application {
    $applicationClass = $this->application->children('/application/load/application')->get(0)->attributes()->get('class')->value();
    $configurationClass = $this->application->children('/application/load/configuration')->get(0)->attributes()->get('class')->value();
    $environmentClass = $this->application->children('/application/load/environment')->get(0)->attributes()->get('class')->value();
    return new $applicationClass(
      new $configurationClass(
        $this->application
      ),
      new $environmentClass(
        $this->environment,
        $this->databases
      )
    );
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Loader;

use Xtuple\Util\Exception\ChainException;
use Xtuple\Util\File\Path\PathString;
use Xtuple\Util\XML\Element\XMLElementString;
use Xtuple\Xdruple\Application\Application;
use Xtuple\Xdruple\Application\Configuration\Environment\Databases\DatabasesGlobals;

final class DrupalApplicationLoader
  implements ApplicationLoader {
  /** @var ApplicationXMLLoader */
  private $loader;

  /**
   * @throws \Throwable
   *
   * @param string $configurationPath
   */
  public function __construct(string $configurationPath) {
    try {
      $this->loader = new ApplicationXMLLoader(
        new XMLElementString(file_get_contents("{$configurationPath}/application/application.xml")),
        (new PathString("{$configurationPath}/application/environment.xml"))->isFile()
          ? new XMLElementString(file_get_contents("{$configurationPath}/application/environment.xml"))
          : new XMLElementString('<environment type="production"></environment>'),
        new DatabasesGlobals()
      );
    }
    catch (\Throwable $e) {
      throw new ChainException($e, 'Failed to prepare Application loader');
    }
  }

  public function application(): Application {
    return $this->loader->application();
  }
}

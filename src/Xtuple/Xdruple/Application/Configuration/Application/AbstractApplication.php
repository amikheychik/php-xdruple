<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Application;

abstract class AbstractApplication
  implements Application {
  /** @var Application */
  private $application;

  public function __construct(Application $application) {
    $this->application = $application;
  }
}

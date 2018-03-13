<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Application;

use Xtuple\Xdruple\Application\Configuration\AbstractConfiguration;

abstract class AbstractApplication
  extends AbstractConfiguration
  implements Application {
  public function __construct(Application $application) {
    parent::__construct($application);
  }
}

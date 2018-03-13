<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

use Xtuple\Xdruple\Application\Configuration\AbstractConfiguration;
use Xtuple\Xdruple\Application\Configuration\Environment\Databases\Databases;
use Xtuple\Xdruple\Application\Configuration\Environment\Type\EnvironmentType;

abstract class AbstractEnvironment
  extends AbstractConfiguration
  implements Environment {
  /** @var Environment */
  private $environment;

  public function __construct(Environment $environment) {
    parent::__construct($environment);
    $this->environment = $environment;
  }

  public final function type(): EnvironmentType {
    return $this->environment->type();
  }

  public final function databases(): Databases {
    return $this->environment->databases();
  }
}

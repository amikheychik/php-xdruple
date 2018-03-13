<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment\Databases;

abstract class AbstractDatabases
  implements Databases {
  /** @var Databases */
  private $databases;

  public function __construct(Databases $databases) {
    $this->databases = $databases;
  }

  public final function value() {
    return $this->databases->value();
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

use Xtuple\Xdruple\Application\Configuration\Environment\Databases\Databases;
use Xtuple\Xdruple\Application\Configuration\Environment\Type\EnvironmentType;

final class EnvironmentStruct
  implements Environment {
  /** @var string */
  private $type;
  /** @var Databases */
  private $databases;
  /** @var array */
  private $configuration;

  public function __construct(EnvironmentType $type, Databases $databases, array $configuration) {
    $this->type = $type;
    $this->databases = $databases;
    $this->configuration = $configuration;
  }

  public function type(): EnvironmentType {
    return $this->type;
  }

  public function databases(): Databases {
    return $this->databases;
  }

  public function value(): array {
    return [
        'environment' => $this->type->value(),
        'databases' => $this->databases->value(),
      ] + $this->configuration;
  }
}

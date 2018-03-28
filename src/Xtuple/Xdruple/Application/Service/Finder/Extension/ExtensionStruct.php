<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Type;

final class ExtensionStruct
  implements Extension {
  /** @var Type */
  private $type;
  /** @var string */
  private $name;

  public function __construct(Type $type, string $name) {
    $this->type = $type;
    $this->name = $name;
  }

  public function type(): Type {
    return $this->type;
  }

  public function name(): string {
    return $this->name;
  }
}

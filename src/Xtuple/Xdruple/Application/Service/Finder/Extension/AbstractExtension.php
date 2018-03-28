<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Type;

abstract class AbstractExtension
  implements Extension {
  /** @var Extension */
  private $extension;

  public function __construct(Extension $extension) {
    $this->extension = $extension;
  }

  public final function type(): Type {
    return $this->extension->type();
  }

  public final function name(): string {
    return $this->extension->name();
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Extension;

abstract class AbstractComponentExtension
  implements ComponentExtension {
  /** @var string */
  private $component;

  public function __construct(string $component) {
    $this->component = $component;
  }

  public final function component(): string {
    return $this->component;
  }
}

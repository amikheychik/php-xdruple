<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Extension;

interface ComponentExtension {
  /**
   * @see Component::name()
   * @return string
   */
  public function component(): string;
}

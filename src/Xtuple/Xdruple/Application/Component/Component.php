<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component;

use Xtuple\Xdruple\Application\Component\Extension\ComponentExtension;

interface Component {
  public function name(): string;

  public function module(): string;

  public function file(): string;

  /**
   * @return string[]
   */
  public function dependencies(): array;

  public function extend(ComponentExtension $extension);
}

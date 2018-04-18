<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application;

use Xtuple\Xdruple\Application\Component\Component;

interface Application {
  public function component(string $name): ?Component;

  /**
   * @throws \Throwable
   *
   * @param int|null $version
   *
   * @return string
   */
  public function update(?int $version): string;
}

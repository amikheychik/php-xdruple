<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path;

/**
 * Interface Path - relative to the Drupal root.
 */
interface Path {
  public function relative(): string;

  public function absolute(): string;
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path;

final class PathStruct
  implements Path {
  /** @var string */
  private $relative;
  /** @var string */
  private $absolute;

  public function __construct(string $relative, string $absolute) {
    $this->relative = $relative;
    $this->absolute = $absolute;
  }

  public function relative(): string {
    return $this->relative;
  }

  public function absolute(): string {
    return $this->absolute;
  }
}

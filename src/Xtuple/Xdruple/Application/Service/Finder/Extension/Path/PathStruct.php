<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Path;

use Xtuple\Xdruple\Application\Service\Finder\Extension\Extension;

final class PathStruct
  implements Path {
  /** @var Extension */
  private $extension;
  /** @var string */
  private $relative;

  public function __construct(Extension $extension, ?string $relative = null) {
    $this->extension = $extension;
    $this->relative = $relative;
  }

  public function extension(): Extension {
    return $this->extension;
  }

  public function relative(): ?string {
    return $this->relative;
  }
}

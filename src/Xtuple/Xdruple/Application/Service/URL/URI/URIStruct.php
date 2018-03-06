<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL\URI;

final class URIStruct
  implements URI {
  /** @var string */
  private $path;
  /** @var array */
  private $options;

  public function __construct(string $path = '', array $options = []) {
    $this->path = $path;
    $this->options = $options;
  }

  public function path(): string {
    return $this->path;
  }

  public function options(): array {
    return $this->options;
  }
}

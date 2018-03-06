<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL\URI;

abstract class AbstractURI
  implements URI {
  /** @var URI */
  private $uri;

  public function __construct(URI $uri) {
    $this->uri = $uri;
  }

  public final function path(): string {
    return $this->uri->path();
  }

  public final function options(): array {
    return $this->uri->options();
  }
}

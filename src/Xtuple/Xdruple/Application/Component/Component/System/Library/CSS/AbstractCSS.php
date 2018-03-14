<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS;

abstract class AbstractCSS
  implements CSS {
  /** @var CSS */
  private $css;

  public function __construct(CSS $css) {
    $this->css = $css;
  }

  public final function data() {
    return $this->css->data();
  }

  public final function options(): ?array {
    return $this->css->options();
  }
}

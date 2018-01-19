<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component;

use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\WebformComponentInfo;

abstract class AbstractWebformComponent
  implements WebformComponent {
  /** @var string */
  private $name;
  /** @var WebformComponentInfo */
  private $info;

  public function __construct(string $name, WebformComponentInfo $info) {
    $this->name = $name;
    $this->info = $info;
  }

  public final function name(): string {
    return $this->name;
  }

  public final function info(): WebformComponentInfo {
    return $this->info;
  }
}

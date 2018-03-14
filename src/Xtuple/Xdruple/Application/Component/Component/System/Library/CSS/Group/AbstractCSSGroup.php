<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group;

abstract class AbstractCSSGroup
  implements CSSGroup {
  /** @var CSSGroup */
  private $group;

  public function __construct(CSSGroup $group) {
    $this->group = $group;
  }

  public final function weight(): int {
    return $this->group->weight();
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group;

final class CSSGroupStruct
  implements CSSGroup {
  /** @var int */
  private $weight;

  public function __construct(int $weight) {
    $this->weight = $weight;
  }

  public function weight(): int {
    return $this->weight;
  }
}

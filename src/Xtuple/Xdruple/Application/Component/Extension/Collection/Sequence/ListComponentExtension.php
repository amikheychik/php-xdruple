<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Extension\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\Sequence;
use Xtuple\Xdruple\Application\Component\Extension\ComponentExtension;

interface ListComponentExtension
  extends Sequence {
  public function append(ComponentExtension $extension): ListComponentExtension;

  /**
   * @param int $key
   *
   * @return ComponentExtension|null
   */
  public function get(int $key);

  /**
   * @return ComponentExtension|null
   */
  public function current();
}

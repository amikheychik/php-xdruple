<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Extension\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\Sequence;
use Xtuple\Xdruple\Application\Component\Extension\ComponentExtension;

interface ListComponentExtension
  extends Sequence {
  /**
   * @throws \Throwable - if extension is of the wrong subtype
   *
   * @param ComponentExtension $extension
   *
   * @return ListComponentExtension
   */
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

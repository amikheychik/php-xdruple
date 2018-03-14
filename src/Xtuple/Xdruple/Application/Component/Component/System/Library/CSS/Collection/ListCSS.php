<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Collection;

use Xtuple\Util\Collection\Sequence\Sequence;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\CSS;

/**
 * List<CSS>
 */
interface ListCSS
  extends Sequence {
  /**
   * @return CSS|null
   *
   * @param int $key
   */
  public function get(int $key);

  /**
   * @return CSS|null
   */
  public function current();
}

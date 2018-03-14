<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Collection;

use Xtuple\Util\Collection\Sequence\AbstractList;
use Xtuple\Util\Collection\Sequence\ArrayList\StrictType\StrictlyTypedArrayList;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\CSS;

/**
 * ArrayList<CSS>
 */
final class ArrayListCSS
  extends AbstractList
  implements ListCSS {
  /**
   * @param CSS[] $elements
   */
  public function __construct(array $elements = []) {
    parent::__construct(new StrictlyTypedArrayList(CSS::class, $elements));
  }
}

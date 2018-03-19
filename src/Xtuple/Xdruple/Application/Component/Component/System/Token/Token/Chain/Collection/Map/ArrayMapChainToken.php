<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map;

use Xtuple\Util\Collection\Map\ArrayMap\StrictType\AbstractStrictlyTypedArrayMap;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\ChainToken;

final class ArrayMapChainToken
  extends AbstractStrictlyTypedArrayMap
  implements MapChainToken {
  /**
   * @param ChainToken[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(ChainToken::class, $elements, 'token');
  }
}

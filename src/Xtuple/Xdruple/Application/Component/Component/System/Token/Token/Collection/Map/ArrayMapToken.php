<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map;

use Xtuple\Util\Collection\Map\ArrayMap\StrictType\AbstractStrictlyTypedArrayMap;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Token;

final class ArrayMapToken
  extends AbstractStrictlyTypedArrayMap
  implements MapToken {
  /**
   * @throws \Throwable - if the elements are of the wrong type
   *
   * @param Token[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(Token::class, $elements, 'token');
  }
}

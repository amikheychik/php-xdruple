<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map;

use Xtuple\Util\Collection\Map\Map;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Token;

interface MapToken
  extends Map {
  /**
   * @param string $key
   *
   * @return Token|null
   */
  public function get(string $key);

  /**
   * @return Token|null
   */
  public function current();
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map;

use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\ChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map\MapToken;

interface MapChainToken
  extends MapToken {
  /**
   * @param string $key
   *
   * @return null|ChainToken
   */
  public function get(string $key);

  /**
   * @return null|ChainToken
   */
  public function current();
}

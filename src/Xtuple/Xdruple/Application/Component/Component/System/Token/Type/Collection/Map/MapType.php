<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Type\Collection\Map;

use Xtuple\Util\Collection\Map\Map;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Type\Type;

interface MapType
  extends Map {
  public function merge(MapType $types): MapType;

  /**
   * @param string $key
   *
   * @return Type|null
   */
  public function get(string $key);

  /**
   * @return Type|null
   */
  public function current();
}

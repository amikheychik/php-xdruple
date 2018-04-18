<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Type\Collection\Map;

use Xtuple\Util\Collection\Map\ArrayMap\StrictType\AbstractStrictlyTypedArrayMap;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Type\Type;

final class ArrayMapType
  extends AbstractStrictlyTypedArrayMap
  implements MapType {
  /**
   * @throws \Throwable - if the elements are of the wrong type
   *
   * @param Type[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(Type::class, $elements, 'type');
  }

  public function merge(MapType $types): MapType {
    $elements = [];
    foreach ($this as $element) {
      $elements[] = $element;
    }
    foreach ($types as $type) {
      $elements[] = $type;
    }
    /** @noinspection PhpUnhandledExceptionInspection - verified Type type */
    return new ArrayMapType($elements);
  }
}

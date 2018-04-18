<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Extension\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\ArrayList\StrictType\AbstractStrictlyTypedArrayList;
use Xtuple\Xdruple\Application\Component\Extension\ComponentExtension;

final class ArrayListComponentExtension
  extends AbstractStrictlyTypedArrayList
  implements ListComponentExtension {
  /** @var string */
  private $subtype;

  /**
   * @throws \Throwable - if $elements contain an element of the wrong $subtype
   *
   * @param array       $elements
   * @param null|string $subtype
   */
  public function __construct(array $elements = [], ?string $subtype = null) {
    $this->subtype = $subtype ?: ComponentExtension::class;
    parent::__construct($this->subtype, $elements);
  }

  public function append(ComponentExtension $extension): ListComponentExtension {
    $elements = [];
    foreach ($this as $element) {
      $elements[] = $element;
    }
    $elements[] = $extension;
    return new ArrayListComponentExtension($elements, $this->subtype);
  }
}

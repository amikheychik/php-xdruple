<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Theme\Element;

interface LazyRender {
  public function preprocess(array &$element);
}

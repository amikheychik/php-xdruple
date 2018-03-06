<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Theme\Element;

interface LazyRenderView
  extends LazyRender {
  public function view(array $overrides = []): array;
}

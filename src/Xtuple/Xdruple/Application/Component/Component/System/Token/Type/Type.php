<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Type;

use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map\MapChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map\MapToken;

interface Type {
  public function type(): string;

  public function name(): string;

  public function description(): string;

  public function data(): ?string;

  public function tokens(): MapToken;

  public function chained(): MapChainToken;
}

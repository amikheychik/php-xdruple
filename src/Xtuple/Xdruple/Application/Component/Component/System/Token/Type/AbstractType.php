<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Type;

use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map\MapChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map\MapToken;

abstract class AbstractType
  implements Type {
  /** @var Type */
  private $type;

  public function __construct(Type $type) {
    $this->type = $type;
  }

  public final function type(): string {
    return $this->type->type();
  }

  public final function name(): string {
    return $this->type->name();
  }

  public final function description(): string {
    return $this->type->description();
  }

  public final function data(): ?string {
    return $this->type->data();
  }

  public final function tokens(): MapToken {
    return $this->type->tokens();
  }

  public final function chained(): MapChainToken {
    return $this->type->chained();
  }
}

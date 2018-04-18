<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Type;

use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map\ArrayMapChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map\MapChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map\MapToken;

final class TypeStruct
  implements Type {
  /** @var string */
  private $type;
  /** @var string */
  private $name;
  /** @var string */
  private $description;
  /** @var string */
  private $data;
  /** @var MapToken */
  private $tokens;
  /** @var MapChainToken */
  private $chained;

  public function __construct(string $type, string $name, string $description, ?string $data, MapToken $tokens,
                              ?MapChainToken $chained = null) {
    $this->type = $type;
    $this->name = $name;
    $this->description = $description;
    $this->data = $data;
    $this->tokens = $tokens;
    /** @noinspection PhpUnhandledExceptionInspection - no arguments passed */
    $this->chained = $chained ?: new ArrayMapChainToken();
  }

  public function type(): string {
    return $this->type;
  }

  public function name(): string {
    return $this->name;
  }

  public function description(): string {
    return $this->description;
  }

  public function data(): ?string {
    return $this->data;
  }

  public function tokens(): MapToken {
    return $this->tokens;
  }

  public function chained(): MapChainToken {
    return $this->chained;
  }
}

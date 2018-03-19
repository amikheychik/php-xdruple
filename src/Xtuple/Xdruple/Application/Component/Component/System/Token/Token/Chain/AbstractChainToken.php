<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain;

use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\AbstractToken;

abstract class AbstractChainToken
  extends AbstractToken
  implements ChainToken {
  /** @var string */
  private $type;

  public function __construct(string $token, string $type, string $name, string $description = '') {
    parent::__construct($token, $name, $description);
    $this->type = $type;
  }

  public final function type(): string {
    return $this->type;
  }

  public abstract function data($data, array $context = []);
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Message;

use Xtuple\Util\Type\String\Message\Argument\Argument;

final class DrupalArgumentKey {
  /** @var Argument */
  private $argument;

  public function __construct(Argument $argument) {
    $this->argument = $argument;
  }

  public function __toString(): string {
    $key = preg_replace('/{(\w+)}/', '!$1', $this->argument->key());
    if (!in_array($key[0], ['!', '@', '%'])) {
      $key = "!{$key}";
    }
    return (string) $key;
  }
}

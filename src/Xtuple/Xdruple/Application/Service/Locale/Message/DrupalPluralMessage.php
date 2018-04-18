<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Message;

use Xtuple\Util\Type\String\Message\Argument\Collection\Map\MapArgument;
use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Util\Type\String\Message\Type\Number\NumberMessage;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralMessage;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;

final class DrupalPluralMessage
  implements PluralMessage {
  /** @var PluralMessage */
  private $plural;

  public function __construct(PluralMessage $plural) {
    $this->plural = $plural;
  }

  public function __toString(): string {
    return $this->format('en_US.UTF-8');
  }

  public function format(string $locale): string {
    return $this->plural->format($locale);
  }

  public function plurals(): MapArgument {
    return $this->plural->plurals();
  }

  public function plural(): Message {
    return new StringMessage(preg_replace('/{(\w+)}/', '!$1', strtr($this->plural->plural()->template(), [
      '{count}' => '@count',
    ])));
  }

  public function singular(): ?Message {
    return new StringMessage(preg_replace('/{(\w+)}/', '!$1', strtr($this->plural->singular()->template(), [
      '{count}' => '@count',
    ])));
  }

  public function template(): string {
    return $this->plural()->template();
  }

  public function count(): NumberMessage {
    return $this->plural->count();
  }

  public function arguments(): MapArgument {
    return $this->plural->arguments();
  }

  public function offset(): ?float {
    return $this->plural->offset();
  }
}

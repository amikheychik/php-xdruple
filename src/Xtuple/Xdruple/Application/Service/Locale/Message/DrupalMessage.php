<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Message;

use Xtuple\Util\Type\String\Message\Argument\Collection\Map\MapArgument;
use Xtuple\Util\Type\String\Message\Message\Message;

final class DrupalMessage
  implements Message {
  /** @var Message */
  private $message;

  public function __construct(Message $message) {
    $this->message = $message;
  }

  public function __toString(): string {
    return $this->format('en_US.UTF-8');
  }

  public function format(string $locale): string {
    $arguments = [];
    foreach ($this->message->arguments() as $argument) {
      $arguments[(string) new DrupalArgumentKey($argument)] = $argument->format($locale);
    }
    return strtr((string) $this->message, $arguments);
  }

  public function template(): string {
    return preg_replace('/{(\w+)}/', '!$1', $this->message->template());
  }

  public function arguments(): MapArgument {
    return $this->message->arguments();
  }
}

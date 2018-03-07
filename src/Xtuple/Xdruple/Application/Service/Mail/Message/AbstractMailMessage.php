<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message;

use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

abstract class AbstractMailMessage
  implements MailMessage {
  /** @var MailMessage */
  private $message;

  public function __construct(MailMessage $message) {
    $this->message = $message;
  }

  public final function key(): string {
    return $this->message->key();
  }

  public final function from(): ?string {
    return $this->message->from();
  }

  public final function to(): string {
    return $this->message->to();
  }

  public final function subject(): string {
    return $this->message->subject();
  }

  public final function body(): string {
    return $this->message->body();
  }

  public final function language(): ?Language {
    return $this->message->language();
  }

  public final function params(): array {
    return $this->message->params();
  }

  public final function send(): bool {
    return $this->message->send();
  }
}

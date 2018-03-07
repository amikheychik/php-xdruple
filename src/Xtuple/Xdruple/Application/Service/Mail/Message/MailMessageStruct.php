<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message;

use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

final class MailMessageStruct
  implements MailMessage {
  /** @var string */
  private $key;
  /** @var null|string */
  private $from;
  /** @var string */
  private $to;
  /** @var string */
  private $subject;
  /** @var string */
  private $body;
  /** @var null|Language */
  private $language;
  /** @var array */
  private $params;
  /** @var bool */
  private $send;

  public function __construct(string $key, ?string $from, string $to, string $subject, string $body,
                              ?Language $language = null, array $params = [], bool $send = true) {
    $this->key = $key;
    $this->from = $from;
    $this->to = $to;
    $this->subject = $subject;
    $this->body = $body;
    $this->language = $language;
    $this->params = $params;
    $this->send = $send;
  }

  public function key(): string {
    return $this->key;
  }

  public function from(): ?string {
    return $this->from;
  }

  public function to(): string {
    return $this->to;
  }

  public function subject(): string {
    return $this->subject;
  }

  public function body(): string {
    return $this->body;
  }

  public function language(): ?Language {
    return $this->language;
  }

  public function params(): array {
    return $this->params;
  }

  public function send(): bool {
    return $this->send;
  }
}

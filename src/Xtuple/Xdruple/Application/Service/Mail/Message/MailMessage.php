<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message;

use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

interface MailMessage {
  public function key(): string;

  public function from(): ?string;

  public function to(): string;

  public function subject(): string;

  public function body(): string;

  public function language(): ?Language;

  public function params(): array;

  public function send(): bool;
}

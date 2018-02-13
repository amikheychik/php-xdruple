<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language;

use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;

abstract class AbstractLanguage
  implements Language {
  /** @var Language */
  private $language;

  public function __construct(Language $language) {
    $this->language = $language;
  }

  public final function language(): string {
    return $this->language->language();
  }

  public final function name(): string {
    return $this->language->name();
  }

  public final function native(): string {
    return $this->language->native();
  }

  public final function direction(): LanguageDirection {
    return $this->language->direction();
  }

  public final function enabled(): bool {
    return $this->language->enabled();
  }

  public final function plurals(): int {
    return $this->language->plurals();
  }

  public final function formula(): string {
    return $this->language->formula();
  }

  public final function domain(): string {
    return $this->language->domain();
  }

  public final function prefix(): string {
    return $this->language->prefix();
  }

  public final function weight(): int {
    return $this->language->weight();
  }

  public final function javascript(): string {
    return $this->language->javascript();
  }
}

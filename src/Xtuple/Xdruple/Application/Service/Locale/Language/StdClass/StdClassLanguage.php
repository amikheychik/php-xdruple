<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language\StdClass;

use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

final class StdClassLanguage
  extends \StdClass
  implements Language {
  /** @var Language */
  private $base;

  public function __construct(Language $language) {
    $this->base = $language;
    $this->language = $language->language();
    $this->name = $language->name();
    $this->native = $language->native();
    $this->direction = $language->direction()->value();
    $this->enabled = (int) $language->enabled();
    $this->plurals = $language->plurals();
    $this->formula = $language->formula();
    $this->domain = $language->domain();
    $this->prefix = $language->prefix();
    $this->weight = $language->weight();
    $this->javascript = $language->javascript();
  }

  public function language(): string {
    return $this->base->language();
  }

  public function name(): string {
    return $this->base->name();
  }

  public function native(): string {
    return $this->base->native();
  }

  public function direction(): LanguageDirection {
    return $this->base->direction();
  }

  public function enabled(): bool {
    return $this->base->enabled();
  }

  public function plurals(): int {
    return $this->base->plurals();
  }

  public function formula(): string {
    return $this->base->formula();
  }

  public function domain(): string {
    return $this->base->domain();
  }

  public function prefix(): string {
    return $this->base->prefix();
  }

  public function weight(): int {
    return $this->base->weight();
  }

  public function javascript(): string {
    return $this->base->javascript();
  }
}

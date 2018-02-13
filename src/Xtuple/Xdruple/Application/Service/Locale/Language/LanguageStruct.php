<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language;

use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;

final class LanguageStruct
  implements Language {
  /** @var string */
  private $language;
  /** @var string */
  private $name;
  /** @var string */
  private $native;
  /** @var LanguageDirection */
  private $direction;
  /** @var bool */
  private $enabled;
  /** @var int */
  private $plurals;
  /** @var string */
  private $formula;
  /** @var string */
  private $domain;
  /** @var string */
  private $prefix;
  /** @var int */
  private $weight;
  /** @var string */
  private $javascript;

  public function __construct(string $language, string $name, string $native, LanguageDirection $direction,
                              bool $enabled, int $plurals, string $formula, string $domain, string $prefix, int $weight,
                              string $javascript) {
    $this->language = $language;
    $this->name = $name;
    $this->native = $native;
    $this->direction = $direction;
    $this->enabled = $enabled;
    $this->plurals = $plurals;
    $this->formula = $formula;
    $this->domain = $domain;
    $this->prefix = $prefix;
    $this->weight = $weight;
    $this->javascript = $javascript;
  }

  public function language(): string {
    return $this->language;
  }

  public function name(): string {
    return $this->name;
  }

  public function native(): string {
    return $this->native;
  }

  public function direction(): LanguageDirection {
    return $this->direction;
  }

  public function enabled(): bool {
    return $this->enabled;
  }

  public function plurals(): int {
    return $this->plurals;
  }

  public function formula(): string {
    return $this->formula;
  }

  public function domain(): string {
    return $this->domain;
  }

  public function prefix(): string {
    return $this->prefix;
  }

  public function weight(): int {
    return $this->weight;
  }

  public function javascript(): string {
    return $this->javascript;
  }
}

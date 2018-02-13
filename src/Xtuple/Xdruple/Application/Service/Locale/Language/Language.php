<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language;

use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;

interface Language {
  public function language(): string;

  public function name(): string;

  public function native(): string;

  public function direction(): LanguageDirection;

  public function enabled(): bool;

  public function plurals(): int;

  public function formula(): string;

  public function domain(): string;

  public function prefix(): string;

  public function weight(): int;

  public function javascript(): string;
}

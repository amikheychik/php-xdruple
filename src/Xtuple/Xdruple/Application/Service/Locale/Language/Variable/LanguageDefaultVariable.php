<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language\Variable;

use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;
use Xtuple\Xdruple\Application\Service\Locale\Language\StdClass\LanguageStdClass;
use Xtuple\Xdruple\Application\Service\Variable\Variable;

final class LanguageDefaultVariable
  implements Language {
  /** @var Variable */
  private $variable;

  public function __construct(Variable $variable) {
    $this->variable = $variable;
  }

  public function language(): string {
    return $this->value()->language();
  }

  public function name(): string {
    return $this->value()->name();
  }

  public function native(): string {
    return $this->value()->native();
  }

  public function direction(): LanguageDirection {
    return $this->value()->direction();
  }

  public function enabled(): bool {
    return $this->value()->enabled();
  }

  public function plurals(): int {
    return $this->value()->plurals();
  }

  public function formula(): string {
    return $this->value()->formula();
  }

  public function domain(): string {
    return $this->value()->domain();
  }

  public function prefix(): string {
    return $this->value()->prefix();
  }

  public function weight(): int {
    return $this->value()->weight();
  }

  public function javascript(): string {
    return $this->value()->javascript();
  }

  private function value(): Language {
    try {
      return new LanguageStdClass($this->variable->get('language_default', $this->english()));
    }
    catch (\Throwable $e) {
      /** @noinspection PhpUnhandledExceptionInspection */
      return new LanguageStdClass($this->english());
    }
  }

  private function english(): \stdClass {
    return (object) [
      'language' => 'en',
      'name' => 'English',
      'native' => 'English',
      'direction' => 0,
      'enabled' => 1,
      'plurals' => 0,
      'formula' => '',
      'domain' => '',
      'prefix' => '',
      'weight' => 0,
      'javascript' => '',
    ];
  }
}

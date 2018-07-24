<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale;

use Xtuple\Xdruple\Application\Service\Locale\Currency\Precision\CurrencyPrecision;
use Xtuple\Xdruple\Application\Service\Locale\Currency\Precision\CurrencyPrecisionStruct;
use Xtuple\Xdruple\Application\Service\Locale\Drupal\DrupalLocaleTestFunctions;

/**
 * Class TestLocale to be used for (unit) testing.
 */
final class TestLocale
  extends AbstractLocale {
  public function __construct(string $locale = 'en_US', array $translations = [],
                              ?CurrencyPrecision $precision = null) {
    parent::__construct(
      new DrupalLocaleTestFunctions($translations),
      $locale,
      $precision ?: new CurrencyPrecisionStruct(null)
    );
  }
}

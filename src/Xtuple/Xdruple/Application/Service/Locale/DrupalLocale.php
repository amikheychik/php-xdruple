<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale;

use Xtuple\Xdruple\Application\Service\Locale\Currency\Precision\CurrencyPrecision;
use Xtuple\Xdruple\Application\Service\Locale\Drupal\DrupalLocaleNativeFunctions;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalLocale
  extends AbstractLocale {
  public function __construct(string $locale, CurrencyPrecision $precision) {
    parent::__construct(
      new DrupalLocaleNativeFunctions(), $locale, $precision);
  }
}

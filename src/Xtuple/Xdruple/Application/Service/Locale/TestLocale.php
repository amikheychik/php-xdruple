<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale;

use Xtuple\Xdruple\Application\Service\Locale\Drupal\DrupalLocaleTestFunctions;

/**
 * Class TestLocale to be used for (unit) testing.
 */
final class TestLocale
  extends AbstractLocale {
  public function __construct(string $locale = 'en_US', array $translations = []) {
    parent::__construct(new DrupalLocaleTestFunctions($translations), $locale);
  }
}

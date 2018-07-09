<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Drupal;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalLocaleNativeFunctions
  implements DrupalLocaleFunctions {
  public function t($string, array $args = [], array $options = []) {
    return t($string, $args, $options);
  }

  public function formatPlural($count, $singular, $plural, array $args = [], array $options = []) {
    return format_plural($count, $singular, $plural, $args, $options);
  }
}

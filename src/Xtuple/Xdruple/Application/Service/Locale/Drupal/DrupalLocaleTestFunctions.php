<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Drupal;

final class DrupalLocaleTestFunctions
  implements DrupalLocaleFunctions {
  /** @var array */
  private $translations;

  public function __construct(array $translations = []) {
    $this->translations = $translations;
  }

  public function t($string, array $args = [], array $options = []) {
    if (isset($options['langcode'])) {
      if (!empty($this->translations[$options['langcode']][$string])) {
        $string = $this->translations[$options['langcode']][$string];
      }
    }
    return strtr($string, $args);
  }

  public function formatPlural($count, $singular, $plural, array $args = [], array $options = []) {
    $args['@count'] = $count;
    if ($count == 1) {
      return $this->t($singular, $args, $options);
    }
    return $this->t($plural, $args, $options);
  }
}

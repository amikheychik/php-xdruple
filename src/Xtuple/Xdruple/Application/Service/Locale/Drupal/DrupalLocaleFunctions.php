<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Drupal;

interface DrupalLocaleFunctions {
  /**
   * @see t()
   *
   * @param       $string
   * @param array $args
   * @param array $options
   *
   * @return null|string
   */
  public function t($string, array $args = [], array $options = []);

  /**
   * @see format_plural()
   *
   * @param       $count
   * @param       $singular
   * @param       $plural
   * @param array $args
   * @param array $options
   *
   * @return string
   */
  public function formatPlural($count, $singular, $plural, array $args = [], array $options = []);
}

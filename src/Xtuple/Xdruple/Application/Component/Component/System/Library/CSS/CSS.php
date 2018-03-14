<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS;

/**
 * @see drupal_add_css()
 */
interface CSS {
  /**
   * @return string|array|null
   */
  public function data();

  public function options(): ?array;
}

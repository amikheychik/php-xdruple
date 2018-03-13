<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalConfiguration
  implements Configuration {
  public function get(string $name, $default = null) {
    return variable_get($name, $default);
  }
}

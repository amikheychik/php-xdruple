<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Variable;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalVariable
  implements Variable {
  public function get(string $name, $default = null) {
    return variable_get($name, $default);
  }

  public function set(string $name, $value) {
    $previous = $this->get($name);
    variable_set($name, $value);
    return $previous;
  }

  public function delete(string $name) {
    $last = $this->get($name);
    variable_del($name);
    return $last;
  }
}

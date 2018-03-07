<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Variable;

final class TestVariable
  implements Variable {
  /** @var array */
  private static $storage = [];

  public function get(string $name, $default = null) {
    return self::$storage[$name] ?? $default;
  }

  public function set(string $name, $value) {
    $previous = $this->get($name);
    self::$storage[$name] = $value;
    return $previous;
  }

  public function delete(string $name) {
    $last = $this->get($name);
    unset(self::$storage[$name]);
    return $last;
  }
}

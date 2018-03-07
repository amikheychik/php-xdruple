<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Variable;

interface Variable {
  /**
   * @param string $name
   * @param mixed  $default
   *
   * @return mixed
   */
  public function get(string $name, $default = null);

  /**
   * @param string $name
   * @param mixed  $value
   *
   * @return mixed - previous value
   */
  public function set(string $name, $value);

  /**
   * @param string $name
   *
   * @return mixed - last value
   */
  public function delete(string $name);
}

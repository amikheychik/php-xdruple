<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration;

interface Configuration {
  /**
   * @param string     $name
   * @param mixed|null $default
   *
   * @return mixed|null
   */
  public function get(string $name, $default = null);
}

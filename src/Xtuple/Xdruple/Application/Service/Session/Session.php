<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session;

use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\ListNotification;

interface Session {
  public function has(string $property): bool;

  /**
   * @param string     $property
   * @param mixed|null $default
   *
   * @return mixed
   */
  public function get(string $property, $default = null);

  /**
   * @param string $property
   * @param mixed  $value
   *
   * @return mixed - property value before the assignment
   */
  public function set(string $property, $value);

  /**
   * @param string $property
   *
   * @return mixed - removed property value
   */
  public function remove(string $property);

  public function notifications(): ListNotification;
}

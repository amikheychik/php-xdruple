<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session;

use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\ListNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\MutableListNotification;

final class TestSession
  implements Session {
  /** @var array */
  private $storage;
  /** @var ListNotification */
  private $notifications;

  public function __construct() {
    $this->storage = [];
    $this->notifications = new MutableListNotification();
  }

  public function has(string $property): bool {
    return (
      isset($this->storage[$property])
      || array_key_exists($property, $this->storage)
    );
  }

  public function get(string $property, $default = null) {
    if ($this->has($property)) {
      return $this->storage[$property];
    }
    return $default;
  }

  public function set(string $property, $value) {
    $previous = $this->get($property);
    $this->storage[$property] = $value;
    return $previous;
  }

  public function remove(string $property) {
    $previous = $this->get($property);
    unset($this->storage[$property]);
    return $previous;
  }

  public function notifications(): ListNotification {
    return $this->notifications;
  }
}


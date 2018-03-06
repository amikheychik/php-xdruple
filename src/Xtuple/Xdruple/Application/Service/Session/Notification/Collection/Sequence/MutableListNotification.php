<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence;

use Xtuple\Xdruple\Application\Service\Session\Notification\Notification;

final class MutableListNotification
  implements ListNotification {
  /** @var ListNotification */
  private $notifications;

  public function __construct() {
    $this->notifications = new ArrayListNotification();
  }

  public function add(Notification $notification): ListNotification {
    $this->notifications = $this->notifications->add($notification);
    return $this->notifications;
  }

  public function append(Notification $notification): ListNotification {
    $this->notifications = $this->notifications->append($notification);
    return $this->notifications;
  }

  public function get(int $key) {
    return $this->notifications->get($key);
  }

  public function current() {
    return $this->notifications->current();
  }

  public function key() {
    return $this->notifications->key();
  }

  public function valid() {
    return $this->notifications->valid();
  }

  public function next() {
    $this->notifications->next();
  }

  public function rewind() {
    $this->notifications->rewind();
  }

  public function isEmpty(): bool {
    return $this->notifications->isEmpty();
  }

  public function count() {
    return $this->notifications->count();
  }
}

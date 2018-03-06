<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\Sequence;
use Xtuple\Xdruple\Application\Service\Session\Notification\Notification;

interface ListNotification
  extends Sequence {
  public function add(Notification $notification): ListNotification;

  public function append(Notification $notification): ListNotification;

  /**
   * @param int $key
   *
   * @return Notification|null
   */
  public function get(int $key);

  /**
   * @return Notification|null
   */
  public function current();
}

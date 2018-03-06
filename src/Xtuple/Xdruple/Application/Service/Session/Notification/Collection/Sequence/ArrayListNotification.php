<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\ArrayList\StrictType\AbstractStrictlyTypedArrayList;
use Xtuple\Xdruple\Application\Service\Session\Notification\Notification;

final class ArrayListNotification
  extends AbstractStrictlyTypedArrayList
  implements ListNotification {
  /**
   * @param Notification[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(Notification::class, $elements);
  }

  public function add(Notification $notification): ListNotification {
    $notifications = [];
    $exists = false;
    foreach ($this as $existing) {
      /** @var Notification $existing */
      $notifications[] = $existing;
      $exists = (
        $notification->message()->__toString() === $existing->message()->__toString()
        && $notification->type()->is($existing->type()->value())
      );
    }
    if (!$exists) {
      $notifications[] = $notification;
    }
    return new ArrayListNotification($notifications);
  }

  public function append(Notification $notification): ListNotification {
    $notifications = [];
    foreach ($this as $existing) {
      /** @var Notification $existing */
      $notifications[] = $existing;
    }
    $notifications[] = $notification;
    return new ArrayListNotification($notifications);
  }
}

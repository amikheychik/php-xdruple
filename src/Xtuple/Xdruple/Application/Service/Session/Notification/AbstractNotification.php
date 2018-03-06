<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\NotificationType;

abstract class AbstractNotification
  implements Notification {
  /** @var Notification */
  private $notification;

  public function __construct(Notification $notification) {
    $this->notification = $notification;
  }

  public final function type(): NotificationType {
    return $this->notification->type();
  }

  public final function message(): Message {
    return $this->notification->message();
  }
}

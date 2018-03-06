<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\NotificationType;

final class NotificationStruct
  implements Notification {
  /** @var NotificationType */
  private $type;
  /** @var Message */
  private $message;

  public function __construct(NotificationType $type, Message $message) {
    $this->type = $type;
    $this->message = $message;
  }

  public function type(): NotificationType {
    return $this->type;
  }

  public function message(): Message {
    return $this->message;
  }
}

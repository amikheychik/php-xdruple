<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Session\Notification\AbstractNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\NotificationStruct;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\NotificationType;

final class WarningNotification
  extends AbstractNotification {
  public function __construct(Message $message) {
    parent::__construct(new NotificationStruct(
      NotificationType::WARNING(),
      $message
    ));
  }
}

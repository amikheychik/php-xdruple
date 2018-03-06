<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\NotificationType;

interface Notification {
  public function type(): NotificationType;

  public function message(): Message;
}

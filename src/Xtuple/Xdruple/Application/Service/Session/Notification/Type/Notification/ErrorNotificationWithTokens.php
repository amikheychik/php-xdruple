<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification;

use Xtuple\Util\Type\String\Message\Message\MessageWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\AbstractNotification;

final class ErrorNotificationWithTokens
  extends AbstractNotification {
  public function __construct(string $message, array $tokens = []) {
    parent::__construct(new ErrorNotification(
      new MessageWithTokens($message, $tokens)
    ));
  }
}

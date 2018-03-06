<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification;

use Xtuple\Util\Type\String\Message\Message\MessageWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\AbstractNotification;

final class WarningNotificationWithTokens
  extends AbstractNotification {
  public function __construct(string $message, array $tokens = []) {
    parent::__construct(new WarningNotification(
      new MessageWithTokens($message, $tokens)
    ));
  }
}

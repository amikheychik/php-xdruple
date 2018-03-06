<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session;

use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\ListNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\MutableListNotification;

final class TestSession
  extends AbstractArraySession {
  /** @var array */
  private $storage;
  /** @var ListNotification */
  private $notifications;

  public function __construct() {
    $this->storage = [];
    $this->notifications = new MutableListNotification();
    parent::__construct($this->storage);
  }

  public function notifications(): ListNotification {
    return $this->notifications;
  }
}

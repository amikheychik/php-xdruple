<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session;

use Xtuple\Xdruple\Application\Service\Locale\Locale;
use Xtuple\Xdruple\Application\Service\Session\Drupal\DrupalMessageFunctions;
use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\DrupalListNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\ListNotification;

final class DrupalSession
  extends AbstractArraySession {
  /** @var Locale */
  private $locale;
  /** @var array */
  private $session;
  /** @var DrupalListNotification */
  private $notifications;

  public function __construct(Locale $locale, DrupalMessageFunctions $drupal) {
    $this->locale = $locale;
    if (!isset($_SESSION)) {
      // Check is required as $_SESSION doesn't exist for Anonymous user
      $_SESSION = [];
    }
    $this->session = &$_SESSION;
    parent::__construct($this->session);
    $this->notifications = new DrupalListNotification($this->locale, $drupal);
  }

  public function notifications(): ListNotification {
    return $this->notifications;
  }
}

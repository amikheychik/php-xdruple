<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session;

use Xtuple\Xdruple\Application\Service\Locale\Locale;
use Xtuple\Xdruple\Application\Service\Session\Drupal\DrupalMessageFunctions;
use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\DrupalListNotification;
use Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence\ListNotification;

final class DrupalSession
  implements Session {
  /** @var DrupalListNotification */
  private $notifications;

  public function __construct(Locale $locale, DrupalMessageFunctions $drupal) {
    if (!isset($_SESSION)) {
      // Check is required as $_SESSION doesn't exist for Anonymous user
      $_SESSION = [];
    }
    $this->notifications = new DrupalListNotification($locale, $drupal);
  }

  public function has(string $property): bool {
    return (
      isset($_SESSION[$property])
      || array_key_exists($property, $_SESSION)
    );
  }

  public function get(string $property, $default = null) {
    if ($this->has($property)) {
      return $_SESSION[$property];
    }
    return $default;
  }

  public function set(string $property, $value) {
    $previous = $this->get($property);
    $_SESSION[$property] = $value;
    return $previous;
  }

  public function remove(string $property) {
    $previous = $this->get($property);
    unset($_SESSION[$property]);
    return $previous;
  }

  public function notifications(): ListNotification {
    return $this->notifications;
  }
}

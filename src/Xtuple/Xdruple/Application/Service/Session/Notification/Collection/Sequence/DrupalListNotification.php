<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence;

use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Service\Locale\Locale;
use Xtuple\Xdruple\Application\Service\Session\Drupal\DrupalMessageFunctions;
use Xtuple\Xdruple\Application\Service\Session\Notification\Notification;
use Xtuple\Xdruple\Application\Service\Session\Notification\NotificationStruct;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\NotificationType;

final class DrupalListNotification
  implements ListNotification {
  /** @var Locale */
  private $locale;
  /** @var DrupalMessageFunctions */
  private $drupal;

  public function __construct(Locale $locale, DrupalMessageFunctions $drupal) {
    $this->locale = $locale;
    $this->drupal = $drupal;
    $this->index();
  }

  /** @var ListNotification */
  private $index;

  private function index(): ListNotification {
    $index = [];
    foreach ($this->drupal->drupalGetMessage(null, false) as $type => $messages) {
      /** @var string[] $messages */
      foreach ($messages as $message) {
        try {
          $index[] = new NotificationStruct(
            new NotificationType($type),
            new StringMessage($message)
          );
        }
        catch (\Throwable $e) {
        }
      }
    }
    /** @noinspection PhpUnhandledExceptionInspection - verified Notification type */
    $this->index = new ArrayListNotification($index);
    return $this->index;
  }

  /**
   * @codeCoverageIgnore Drupal
   *
   * @param Notification $notification
   *
   * @return ListNotification
   */
  public function add(Notification $notification): ListNotification {
    $this->drupal->drupalSetMessage(
      $this->locale->translate($notification->message()),
      $notification->type()->value(),
      false
    );
    return $this->index();
  }

  /**
   * @codeCoverageIgnore Drupal
   *
   * @param Notification $notification
   *
   * @return ListNotification
   */
  public function append(Notification $notification): ListNotification {
    $this->drupal->drupalSetMessage(
      $this->locale->translate($notification->message()),
      $notification->type()->value()
    );
    return $this->index();
  }

  public function get(int $key) {
    $this->rewind();
    return $this->index->get($key);
  }

  public function current() {
    return $this->index->current();
  }

  public function key() {
    return $this->index->key();
  }

  public function valid() {
    return $this->index->valid();
  }

  public function next() {
    $this->index->next();
  }

  public function rewind() {
    $this->index->rewind();
  }

  public function isEmpty(): bool {
    return $this->index->isEmpty();
  }

  public function count() {
    return $this->index->count();
  }
}

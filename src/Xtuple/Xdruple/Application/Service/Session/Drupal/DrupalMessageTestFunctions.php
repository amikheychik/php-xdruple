<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Drupal;

final class DrupalMessageTestFunctions
  implements DrupalMessageFunctions {
  /** @var array|null */
  private $messages;

  public function __construct(array &$messages = null) {
    $this->messages = &$messages ?: [];
  }

  public function drupalSetMessage(?string $message = null, string $type = 'status', bool $repeat = true): ?array {
    if ($message !== null) {
      if (!isset($this->messages)) {
        $this->messages = [];
      }
      if (!isset($this->messages[$type])) {
        $this->messages[$type] = [];
      }
      if ($repeat
        || !in_array($message, $this->messages[$type], true)) {
        $this->messages[$type][] = $message;
      }
    }
    return $this->messages;
  }

  public function drupalGetMessage(?string $type = null, bool $clearQueue = true): array {
    if ($messages = $this->drupalSetMessage()) {
      if ($type) {
        if ($clearQueue) {
          unset($this->messages[$type]);
        }
        if (isset($messages[$type])) {
          return [$type => $messages[$type]];
        }
      }
      else {
        if ($clearQueue) {
          $this->messages = [];
        }
        return $messages;
      }
    }
    return [];
  }
}

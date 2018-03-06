<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Drupal;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalMessageNativeFunctions
  implements DrupalMessageFunctions {
  public function drupalSetMessage(?string $message = null, string $type = 'status', bool $repeat = true): ?array {
    return drupal_set_message($message, $type, $repeat);
  }

  public function drupalGetMessage(?string $type = null, bool $clearQueue = true): array {
    return drupal_get_messages($type, $clearQueue);
  }
}

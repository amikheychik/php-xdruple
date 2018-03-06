<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Drupal;

interface DrupalMessageFunctions {
  /**
   * @see drupal_set_message()
   *
   * @param null|string $message
   * @param string      $type
   * @param bool        $repeat
   *
   * @return null|array
   */
  public function drupalSetMessage(?string $message = null, string $type = 'status', bool $repeat = true): ?array;

  /**
   * @see drupal_get_messages()
   *
   * @param null|string $type
   * @param bool        $clearQueue
   *
   * @return array
   */
  public function drupalGetMessage(?string $type = null, bool $clearQueue = true): array;
}

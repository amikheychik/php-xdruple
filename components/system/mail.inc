<?php declare(strict_types=1);

/**
 * @file keeps Mail API hooks implementations
 * @see  https://api.drupal.org/api/drupal/modules!system!system.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\System\Mail\MailComponent;

/**
 * Implements hook_mail().
 *
 * @param string $key
 * @param array  $message
 * @param array  $params
 */
function xdruple_mail($key, &$message, $params) {
  _xdruple_application_mail_component()->mail($key, $message, $params);
}

/**
 * Implements hook_mail_alter().
 *
 * @param array $message
 */
function xdruple_mail_alter(&$message) {
  _xdruple_application_mail_component()->mailAlter($message);
}

function _xdruple_application_mail_component(): MailComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(MailComponent::NAME);
  /** @var MailComponent $component */
  return $component;
}

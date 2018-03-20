<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\User;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalUser
  implements User {
  public function active(): \stdClass {
    return user_load($GLOBALS['user']->uid);
  }
}

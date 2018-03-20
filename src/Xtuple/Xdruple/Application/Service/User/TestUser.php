<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\User;

final class TestUser
  implements User {
  /** @var \stdClass */
  private $active;

  public function __construct(\stdClass $active) {
    $this->active = $active;
  }

  public function active(): \stdClass {
    return $this->active;
  }
}

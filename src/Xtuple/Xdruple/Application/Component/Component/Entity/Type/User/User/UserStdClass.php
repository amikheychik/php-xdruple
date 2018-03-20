<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\User\User;

final class UserStdClass
  implements User {
  /** @var \stdClass */
  private $user;

  public function __construct(\stdClass $user) {
    $this->user = $user;
  }

  public function uid(): int {
    return !empty($this->user->uid) ? (int) $this->user->uid : 0;
  }

  public function email(): string {
    return !empty($this->user->mail) ? (string) $this->user->mail : '';
  }

  public function isAnonymous(): bool {
    return $this->uid() === 0;
  }
}

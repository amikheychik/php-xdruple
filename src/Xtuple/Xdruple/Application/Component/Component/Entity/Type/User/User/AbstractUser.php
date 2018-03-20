<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\User\User;

abstract class AbstractUser
  implements User {
  /** @var User */
  private $user;

  public function __construct(User $user) {
    $this->user = $user;
  }

  public final function uid(): int {
    return $this->user->uid();
  }

  public final function email(): string {
    return $this->user->email();
  }

  public final function isAnonymous(): bool {
    return $this->user->isAnonymous();
  }
}

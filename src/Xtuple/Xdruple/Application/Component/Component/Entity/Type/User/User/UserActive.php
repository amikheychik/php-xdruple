<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\User\User;

use Xtuple\Xdruple\Application\Service\User\User;

final class UserActive
  extends AbstractUser {
  public function __construct(User $user) {
    parent::__construct(new UserStdClass($user->active()));
  }
}

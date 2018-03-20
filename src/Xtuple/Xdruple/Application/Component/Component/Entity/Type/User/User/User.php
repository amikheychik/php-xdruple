<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\User\User;

interface User {
  public function uid(): int;

  public function email(): string;

  public function isAnonymous(): bool;
}

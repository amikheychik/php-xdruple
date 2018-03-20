<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\User;

interface User {
  public function active(): \stdClass;
}

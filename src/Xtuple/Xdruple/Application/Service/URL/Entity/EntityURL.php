<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL\Entity;

use Xtuple\Xdruple\Application\Service\URL\URI\URI;

interface EntityURL {
  public function uri(string $type, $entity): URI;
}

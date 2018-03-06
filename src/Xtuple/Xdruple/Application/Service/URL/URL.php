<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\URL\URI\URI;

interface URL {
  public function url(URI $path): string;

  public function l(Message $text, URI $path): string;

  /**
   * @param string $type
   * @param object $entity
   *
   * @return URI
   */
  public function entity(string $type, $entity): URI;

  public function isActive(URI $uri): bool;
}

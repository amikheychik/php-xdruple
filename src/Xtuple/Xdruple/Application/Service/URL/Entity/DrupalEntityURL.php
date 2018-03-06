<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL\Entity;

use Xtuple\Xdruple\Application\Service\URL\URI\URI;
use Xtuple\Xdruple\Application\Service\URL\URI\URIArray;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalEntityURL
  implements EntityURL {
  public function uri(string $type, $entity): URI {
    return new URIArray(entity_uri($type, $entity));
  }
}

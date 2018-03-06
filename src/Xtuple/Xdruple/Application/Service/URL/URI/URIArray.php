<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL\URI;

final class URIArray
  extends AbstractURI {
  public function __construct(array $uri) {
    $uri += [
      'options' => [],
    ];
    parent::__construct(new URIStruct($uri['path'], $uri['options']));
  }
}

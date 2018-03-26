<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key;

use Xtuple\Util\Cache\Key\Key as CacheKey;
use Xtuple\Util\Type\String\Chars;

interface Key
  extends CacheKey,
          Chars {
  public function cid(): string;
}

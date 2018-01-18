<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Cache;

use Xtuple\Xdruple\Application\Component\Component;

interface CacheComponent
  extends Component {
  public const NAME = 'cache';

  /**
   * @see hook_flush_caches().
   *
   * @return array
   */
  public function flushCaches();
}

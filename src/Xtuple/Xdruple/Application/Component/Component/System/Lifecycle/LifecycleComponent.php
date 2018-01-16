<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Lifecycle;

use Xtuple\Xdruple\Application\Component\Component;

interface LifecycleComponent
  extends Component {
  public const NAME = 'lifecycle';

  /**
   * @see hook_boot()
   */
  public function boot();

  /**
   * @see hook_init()
   */
  public function init();

  /**
   * @see hook_exit()
   *
   * @param string $destination
   */
  public function exit($destination = null);
}

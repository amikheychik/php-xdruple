<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Permission;

use Xtuple\Xdruple\Application\Component\Component;

interface PermissionComponent
  extends Component {
  public const NAME = 'permission';

  /**
   * @see hook_permission().
   *
   * @return array
   */
  public function permission();
}

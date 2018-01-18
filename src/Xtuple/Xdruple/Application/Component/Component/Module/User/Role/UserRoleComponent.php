<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\User\Role;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see user.api.php (https://api.drupal.org/api/drupal/modules!user!user.api.php/7)
 */
interface UserRoleComponent
  extends Component {
  public const NAME = 'user_role';

  /**
   * @see hook_user_role_presave()
   *
   * @param $role
   */
  public function userRolePresave($role);

  /**
   * @see hook_user_role_insert()
   *
   * @param $role
   */
  public function userRoleInsert($role);

  /**
   * @see hook_user_role_update()
   *
   * @param $role
   */
  public function userRoleUpdate($role);

  /**
   * @see hook_user_role_delete()
   *
   * @param $role
   */
  public function userRoleDelete($role);
}

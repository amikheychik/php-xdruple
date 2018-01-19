<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\User;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see user.api.php (https://api.drupal.org/api/drupal/modules!user!user.api.php/7)
 */
interface UserComponent
  extends Component {
  public const NAME = 'user';

  /**
   * @see hook_user_cancel_methods_alter()
   *
   * @param array $methods
   */
  public function userCancelMethodsAlter(&$methods);

  /**
   * @see hook_user_categories()
   *
   * @return array
   */
  public function userCategories();

  /**
   * @see hook_user_operations()
   *
   * @return array
   */
  public function userOperations();

  /**
   * @see hook_user_login()
   *
   * @param $edit
   * @param $account
   */
  public function userLogin(&$edit, $account);

  /**
   * @see hook_user_logout()
   *
   * @param $account
   */
  public function userLogout($account);

  /**
   * @see hook_user_presave()
   *
   * @param $edit
   * @param $account
   * @param $category
   */
  public function userPresave(&$edit, $account, $category);

  /**
   * @see hook_user_insert()
   *
   * @param $edit
   * @param $account
   * @param $category
   */
  public function userInsert(&$edit, $account, $category);

  /**
   * @see hook_user_update()
   *
   * @param $edit
   * @param $account
   * @param $category
   */
  public function userUpdate(&$edit, $account, $category);

  /**
   * @see hook_user_load()
   *
   * @param $users
   */
  public function userLoad($users);

  /**
   * @see hook_user_cancel()
   *
   * @param $edit
   * @param $account
   * @param $method
   */
  public function userCancel($edit, $account, $method);

  /**
   * @see hook_user_delete()
   *
   * @param $account
   */
  public function userDelete($account);

  /**
   * @see hook_user_view()
   *
   * @param $account
   * @param $viewMode
   * @param $langcode
   */
  public function userView($account, $viewMode, $langcode);

  /**
   * @see hook_user_view_alter()
   *
   * @param $build
   */
  public function userViewAlter(&$build);

  /**
   * @see hook_username_alter()
   *
   * @param $name
   * @param $account
   */
  public function usernameAlter(&$name, $account);
}

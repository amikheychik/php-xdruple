<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Module\User\Role\UserRoleComponent;

/**
 * Implements hook_user_role_presave().
 *
 * @param $role
 */
function xdruple_user_role_presave($role) {
  _xdruple_application_user_role_component()->userRolePresave($role);
}

/**
 * Implements hook_user_role_insert().
 *
 * @param $role
 */
function xdruple_user_role_insert($role) {
  _xdruple_application_user_role_component()->userRoleInsert($role);
}

/**
 * Implements hook_user_role_update().
 *
 * @param $role
 */
function xdruple_user_role_update($role) {
  _xdruple_application_user_role_component()->userRoleUpdate($role);
}

/**
 * Implements hook_user_role_delete().
 *
 * @param $role
 */
function xdruple_user_role_delete($role) {
  _xdruple_application_user_role_component()->userRoleDelete($role);
}

function _xdruple_application_user_role_component(): UserRoleComponent {
  /** @var UserRoleComponent $component */
  $component = xdruple_application()->component(UserRoleComponent::NAME);
  return $component;
}

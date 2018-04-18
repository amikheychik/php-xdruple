<?php declare(strict_types=1);

/**
 * @file keeps implementations for hook from user.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\Entity\Type\User\UserComponent;

/**
 * Implements hook_user_cancel_methods_alter().
 *
 * @param array $methods
 */
function xdruple_user_cancel_methods_alter(&$methods) {
  _xdruple_application_user_component()->userCancelMethodsAlter($methods);
}

/**
 * Implements hook_user_categories().
 */
function xdruple_user_categories() {
  return _xdruple_application_user_component()->userCategories();
}

/**
 * Implements hook_user_operations().
 */
function xdruple_user_operations() {
  return _xdruple_application_user_component()->userOperations();
}

/**
 * Implements hook_user_login().
 *
 * @param $edit
 * @param $account
 */
function xdruple_user_login(&$edit, $account) {
  _xdruple_application_user_component()->userLogin($edit, $account);
}

/**
 * Implements hook_user_logout().
 *
 * @param $account
 */
function xdruple_user_logout($account) {
  _xdruple_application_user_component()->userLogout($account);
}

/**
 * Implements hook_user_presave().
 *
 * @param $edit
 * @param $account
 * @param $category
 */
function xdruple_user_presave(&$edit, $account, $category) {
  _xdruple_application_user_component()->userPresave($edit, $account, $category);
}

/**
 * Implements hook_user_insert().
 *
 * @param $edit
 * @param $account
 * @param $category
 *
 * @throws \Throwable
 */
function xdruple_user_insert(&$edit, $account, $category) {
  _xdruple_application_user_component()->userInsert($edit, $account, $category);
}

/**
 * Implements hook_user_update().
 *
 * @param $edit
 * @param $account
 * @param $category
 */
function xdruple_user_update(&$edit, $account, $category) {
  _xdruple_application_user_component()->userUpdate($edit, $account, $category);
}

/**
 * Implements hook_user_load().
 *
 * @param array $users
 */
function xdruple_user_load($users) {
  _xdruple_application_user_component()->userLoad($users);
}

/**
 * Implements hook_user_cancel().
 *
 * @param $edit
 * @param $account
 * @param $method
 */
function xdruple_user_cancel($edit, $account, $method) {
  _xdruple_application_user_component()->userCancel($edit, $account, $method);
}

/**
 * Implements hook_user_delete().
 *
 * @param $account
 */
function xdruple_user_delete($account) {
  _xdruple_application_user_component()->userDelete($account);
}

/**
 * Implements hook_user_view().
 *
 * @param $account
 * @param $view_mode
 * @param $langcode
 */
function xdruple_user_view($account, $view_mode, $langcode) {
  _xdruple_application_user_component()->userView($account, $view_mode, $langcode);
}

/**
 * Implements hook_user_view_alter().
 *
 * @param $build
 */
function xdruple_user_view_alter(&$build) {
  _xdruple_application_user_component()->userViewAlter($build);
}

/**
 * Implements hook_username_alter().
 *
 * @param $name
 * @param $account
 */
function xdruple_username_alter(&$name, $account) {
  _xdruple_application_user_component()->usernameAlter($name, $account);
}

function _xdruple_application_user_component(): UserComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(UserComponent::NAME);
  /** @var UserComponent $component */
  return $component;
}

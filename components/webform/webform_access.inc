<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\Access\WebformAccessComponent;

/**
 * Implements hook_webform_submission_access().
 *
 * @param        $node
 * @param        $submission
 * @param string $op
 * @param null   $account
 *
 * @return bool
 */
function xdruple_webform_submission_access($node, $submission, $op = 'view', $account = null) {
  return _xdruple_application_webform_access_component()->webformSubmissionAccess($node, $submission, $op, $account);
}

/**
 * Implements hook_webform_results_access().
 *
 * @param $node
 * @param $account
 *
 * @return bool
 */
function xdruple_webform_results_access($node, $account) {
  return _xdruple_application_webform_access_component()->webformResultsAccess($node, $account);
}

/**
 * Implements hook_webform_results_clear_access().
 *
 * @param $node
 * @param $account
 *
 * @return bool
 */
function xdruple_webform_results_clear_access($node, $account) {
  return _xdruple_application_webform_access_component()->webformResultsClearAccess($node, $account);
}

/**
 * Implements hook_webform_update_access().
 *
 * @param $node
 * @param $account
 *
 * @return bool
 */
function xdruple_webform_update_access($node, $account) {
  return _xdruple_application_webform_access_component()->webformUpdateAccess($node, $account);
}

function _xdruple_application_webform_access_component(): WebformAccessComponent {
  /** @var WebformAccessComponent $component */
  $component = xdruple_application()->component(WebformAccessComponent::NAME);
  return $component;
}

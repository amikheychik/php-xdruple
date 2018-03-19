<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Webform\Submission\WebformSubmissionComponent;

/**
 * Implements hook_webform_submission_load().
 *
 * @param array $submissions
 */
function xdruple_webform_submission_load(&$submissions) {
  _xdruple_application_webform_submission_component()->webformSubmissionLoad($submissions);
}

/**
 * Implements hook_webform_submission_create_alter().
 *
 * @param       $submission
 * @param       $node
 * @param       $account
 * @param array $form_state
 */
function xdruple_webform_submission_create_alter(&$submission, &$node, &$account, &$form_state) {
  _xdruple_application_webform_submission_component()->webformSubmissionCreateAlter(
    $submission,
    $node,
    $account,
    $form_state
  );
}

/**
 * Implements hook_webform_submission_presave().
 *
 * @param $node
 * @param $submission
 */
function xdruple_webform_submission_presave($node, &$submission) {
  _xdruple_application_webform_submission_component()->webformSubmissionPresave($node, $submission);
}

/**
 * Implements hook_webform_submission_insert().
 *
 * @param $node
 * @param $submission
 */
function xdruple_webform_submission_insert($node, $submission) {
  _xdruple_application_webform_submission_component()->webformSubmissionInsert($node, $submission);
}

/**
 * Implements hook_webform_submission_update().
 *
 * @param $node
 * @param $submission
 */
function xdruple_webform_submission_update($node, $submission) {
  _xdruple_application_webform_submission_component()->webformSubmissionUpdate($node, $submission);
}

/**
 * Implements hook_webform_submission_delete().
 *
 * @param $node
 * @param $submission
 */
function xdruple_webform_submission_delete($node, $submission) {
  _xdruple_application_webform_submission_component()->webformSubmissionDelete($node, $submission);
}

/**
 * Implements hook_webform_submission_actions().
 *
 * @param $node
 * @param $submission
 *
 * @return array
 */
function xdruple_webform_submission_actions($node, $submission) {
  return _xdruple_application_webform_submission_component()->webformSubmissionActions($node, $submission);
}

/**
 * Implements hook_webform_draft_alter().
 *
 * @param int   $sid
 * @param array $context
 */
function xdruple_webform_draft_alter(&$sid, $context) {
  _xdruple_application_webform_submission_component()->webformDraftAlter($sid, $context);
}

/**
 * Implements hook_webform_submission_render_alter().
 *
 * @param array $submission - Drupal render array
 */
function xdruple_webform_submission_render_alter(&$submission) {
  _xdruple_application_webform_submission_component()->webformSubmissionRenderAlter($submission);
}

function _xdruple_application_webform_submission_component(): WebformSubmissionComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(WebformSubmissionComponent::NAME);
  /** @var WebformSubmissionComponent $component */
  return $component;
}

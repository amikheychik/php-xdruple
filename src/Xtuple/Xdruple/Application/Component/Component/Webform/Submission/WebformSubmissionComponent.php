<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Submission;

interface WebformSubmissionComponent {
  public const NAME = 'webform_submission';

  /**
   * @see hook_webform_submission_load()
   *
   * @param array $submissions
   */
  public function webformSubmissionLoad(&$submissions);

  /**
   * @see hook_webform_submission_create_alter()
   *
   * @param       $submission
   * @param       $node
   * @param       $account
   * @param array $formState
   */
  public function webformSubmissionCreateAlter(&$submission, &$node, &$account, &$formState);

  /**
   * @see hook_webform_submission_presave()
   *
   * @param $node
   * @param $submission
   */
  public function webformSubmissionPresave($node, &$submission);

  /**
   * @see hook_webform_submission_insert()
   *
   * @param $node
   * @param $submission
   */
  public function webformSubmissionInsert($node, $submission);

  /**
   * @see hook_webform_submission_update()
   *
   * @param $node
   * @param $submission
   */
  public function webformSubmissionUpdate($node, $submission);

  /**
   * @see hook_webform_submission_delete()
   *
   * @param $node
   * @param $submission
   */
  public function webformSubmissionDelete($node, $submission);

  /**
   * @see hook_webform_submission_actions()
   *
   * @param $node
   * @param $submission
   *
   * @return array
   */
  public function webformSubmissionActions($node, $submission);

  /**
   * @see hook_webform_draft_alter()
   *
   * @param int   $sid
   * @param array $context
   */
  public function webformDraftAlter(&$sid, $context);

  /**
   * @see hook_webform_submission_render_alter()
   *
   * @param array $submission - Drupal render array
   */
  public function webformSubmissionRenderAlter(&$submission);
}

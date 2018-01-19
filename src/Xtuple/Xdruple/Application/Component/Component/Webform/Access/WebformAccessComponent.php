<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Access;

interface WebformAccessComponent {
  public const NAME = 'webform_access';

  /**
   * @see hook_webform_submission_access()
   *
   * @param        $node
   * @param        $submission
   * @param string $op
   * @param null   $account
   *
   * @return bool
   */
  public function webformSubmissionAccess($node, $submission, $op = 'view', $account = null);

  /**
   * @see hook_webform_results_access()
   *
   * @param $node
   * @param $account
   *
   * @return bool
   */
  public function webformResultsAccess($node, $account);

  /**
   * @see hook_webform_results_clear_access()
   *
   * @param $node
   * @param $account
   *
   * @return bool
   */
  public function webformResultsClearAccess($node, $account);

  /**
   * @see hook_webform_update_access()
   *
   * @param $node
   * @param $account
   *
   * @return bool
   */
  public function webformUpdateAccess($node, $account);
}

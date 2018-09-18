<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Batch;

interface BatchComponent {
  public const NAME = 'batch';

  /**
   * @see hook_batch_alter().
   *
   * @param array $batch
   */
  public function batchAlter(&$batch);

  /**
   * @see callback_batch_operation().
   *
   * @param array $args
   */
  public function batchOperation(&...$args);

  /**
   * @see callback_batch_finished().
   *
   * @param       $success
   * @param       $results
   * @param array $operations
   */
  public function batchFinished($success, $results, $operations);
}

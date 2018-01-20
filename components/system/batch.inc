<?php declare(strict_types=1);

/**
 * @file keeps Batch API hooks and callbacks implementations
 * @see  https://api.drupal.org/api/drupal/includes!form.inc/group/batch/7.x
 */

use Xtuple\Xdruple\Application\Component\Component\System\Batch\BatchComponent;

/**
 * Implements hook_batch_alter().
 *
 * @param array $batch
 */
function xdruple_batch_alter(&$batch) {
  _xdruple_application_batch_component()->batchAlter($batch);
}

/**
 * Implements callback_batch_operation().
 *
 * @param array $args
 */
function xdruple_batch_operation(&...$args) {
  _xdruple_application_batch_component()->batchOperation(...$args);
}

/**
 * Implements callback_batch_finished().
 *
 * @param bool $success
 * @param      $results
 * @param      $operations
 */
function xdruple_batch_finished($success, $results, $operations) {
  _xdruple_application_batch_component()->batchFinished($success, $results, $operations);
}

function _xdruple_application_batch_component(): BatchComponent {
  /** @var BatchComponent $component */
  $component = xdruple_application()->component(BatchComponent::NAME);
  return $component;
}

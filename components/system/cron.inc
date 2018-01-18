<?php declare(strict_types=1);

/**
 * @file keeps Cron API hooks implementations
 * @see  https://api.drupal.org/api/drupal/modules!system!system.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\System\Cron\CronComponent;

/**
 * Implements hook_cron_queue_info().
 *
 * @return array
 */
function xdruple_cron_queue_info() {
  return _xdruple_application_cron_component()->cronQueueInfo();
}

/**
 * Implements hook_cron_queue_info_alter().
 *
 * @param array $queues
 */
function xdruple_cron_queue_info_alter(&$queues) {
  _xdruple_application_cron_component()->cronQueueInfoAlter($queues);
}

/**
 * Implements hook_cron().
 */
function xdruple_cron() {
  _xdruple_application_cron_component()->cron();
}

/**
 * @see   callback_queue_worker()
 *
 * @param array $queue_item
 *
 * @throw \Exception
 */
function xdruple_queue_worker($queue_item) {
  _xdruple_application_cron_component()->cronQueueWorker($queue_item);
}

function _xdruple_application_cron_component(): CronComponent {
  /** @var CronComponent $component */
  $component = xdruple_application()->component(CronComponent::NAME);
  return $component;
}

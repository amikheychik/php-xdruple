<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Cron;

use Xtuple\Xdruple\Application\Component\Component;

interface CronComponent
  extends Component {
  public const NAME = 'cron';

  /**
   * @see hook_cron_queue_info()
   *
   * @return array
   */
  public function cronQueueInfo();

  /**
   * @see hook_cron_queue_info_alter()
   *
   * @param array $queues
   */
  public function cronQueueInfoAlter(&$queues);

  /**
   * @see hook_cron()
   */
  public function cron();

  /**
   * @see callback_queue_worker()
   *
   * @param array $queueItem
   */
  public function cronQueueWorker($queueItem);
}

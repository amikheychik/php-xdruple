<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\Sequence;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;

interface ListLogRecord
  extends Sequence {
  public function append(LogRecord $record): ListLogRecord;

  /**
   * @param int $key
   *
   * @return LogRecord|null
   */
  public function get(int $key);

  /**
   * @return LogRecord|null
   */
  public function current();
}

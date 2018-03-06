<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log;

use Xtuple\Xdruple\Application\Service\Log\Record\Collection\Sequence\ArrayListLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Collection\Sequence\ListLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;

final class TestLog
  implements Log,
             ListLogRecord {
  /** @var ListLogRecord */
  private $log;

  public function __construct() {
    $this->log = new ArrayListLogRecord();
  }

  public function log(LogRecord $record): void {
    $this->append($record);
  }

  public function append(LogRecord $record): ListLogRecord {
    $this->log = $this->log->append($record);
    return $this->log;
  }

  public function isEmpty(): bool {
    return $this->log->isEmpty();
  }

  public function count() {
    return $this->log->count();
  }

  public function get(int $key) {
    return $this->log->get($key);
  }

  public function current() {
    return $this->log->current();
  }

  public function key() {
    return $this->log->key();
  }

  public function valid() {
    return $this->log->valid();
  }

  public function next() {
    $this->log->next();
  }

  public function rewind() {
    $this->log->rewind();
  }
}

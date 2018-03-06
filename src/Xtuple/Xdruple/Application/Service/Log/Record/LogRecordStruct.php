<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\Details\LogRecordDetails;

final class LogRecordStruct
  implements LogRecord {
  /** @var string */
  private $type;
  /** @var LogLevel */
  private $level;
  /** @var Message */
  private $log;
  /** @var null|LogRecordDetails */
  private $details;
  /** @var null|Message */
  private $notification;

  public function __construct(string $type, LogLevel $level, Message $log, ?LogRecordDetails $details,
                              ?Message $notification) {
    $this->type = $type;
    $this->level = $level;
    $this->log = $log;
    $this->details = $details;
    $this->notification = $notification;
  }

  public function type(): string {
    return $this->type;
  }

  public function level(): LogLevel {
    return $this->level;
  }

  public function message(): Message {
    return $this->log;
  }

  public function details(): ?LogRecordDetails {
    return $this->details;
  }

  public function notification(): ?Message {
    return $this->notification;
  }
}

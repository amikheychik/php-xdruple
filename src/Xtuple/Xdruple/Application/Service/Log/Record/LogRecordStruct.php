<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record;

use Xtuple\Util\Type\String\Message\Message\Collection\Sequence\ArrayListMessage;
use Xtuple\Util\Type\String\Message\Message\Collection\Sequence\ListMessage;
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
  /** @var ListMessage */
  private $notifications;

  public function __construct(string $type, LogLevel $level, Message $log, ?LogRecordDetails $details,
                              ?ListMessage $notifications) {
    $this->type = $type;
    $this->level = $level;
    $this->log = $log;
    $this->details = $details;
    /** @noinspection PhpUnhandledExceptionInspection - $messages is empty */
    $this->notifications = $notifications ?: new ArrayListMessage();
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

  public function notifications(): ListMessage {
    return $this->notifications;
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record;

use Xtuple\Util\Type\String\Message\Message\Collection\Sequence\ListMessage;
use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\Details\LogRecordDetails;

abstract class AbstractLogRecord
  implements LogRecord {
  /** @var LogRecord */
  private $record;

  public function __construct(LogRecord $record) {
    $this->record = $record;
  }

  public final function type(): string {
    return $this->record->type();
  }

  public final function level(): LogLevel {
    return $this->record->level();
  }

  public final function message(): Message {
    return $this->record->message();
  }

  public final function details(): ?LogRecordDetails {
    return $this->record->details();
  }

  public final function notifications(): ListMessage {
    return $this->record->notifications();
  }
}

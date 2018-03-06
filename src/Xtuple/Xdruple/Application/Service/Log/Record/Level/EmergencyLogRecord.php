<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record\Level;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\AbstractLogRecord;
use Xtuple\Xdruple\Application\Service\Log\Record\Details\LogRecordDetails;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecordStruct;

final class EmergencyLogRecord
  extends AbstractLogRecord {
  public function __construct(string $type, Message $log, ?LogRecordDetails $details = null,
                              ?Message $notification = null) {
    parent::__construct(new LogRecordStruct($type, LogLevel::EMERGENCY(), $log, $details, $notification));
  }
}

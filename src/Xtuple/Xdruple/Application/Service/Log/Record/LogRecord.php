<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Log\Level\LogLevel;
use Xtuple\Xdruple\Application\Service\Log\Record\Details\LogRecordDetails;

interface LogRecord {
  public function type(): string;

  public function level(): LogLevel;

  public function message(): Message;

  public function details(): ?LogRecordDetails;

  public function notification(): ?Message;
}

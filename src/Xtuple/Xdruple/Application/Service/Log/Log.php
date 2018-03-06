<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log;

use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;

interface Log {
  public function log(LogRecord $record): void;
}

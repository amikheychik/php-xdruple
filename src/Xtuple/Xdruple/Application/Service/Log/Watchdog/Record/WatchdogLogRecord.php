<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Watchdog\Record;

use Xtuple\Xdruple\Application\Service\Locale\Message\DrupalArgumentKey;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;
use Xtuple\Xdruple\Application\Service\Log\Watchdog\WatchdogFromLevel;

final class WatchdogLogRecord {
  /** @var LogRecord */
  private $record;

  public function __construct(LogRecord $record) {
    $this->record = $record;
  }

  public function type(): string {
    return $this->record->type();
  }

  public function message(): string {
    return $this->record->message()->template();
  }

  public function variables(): array {
    $variables = [];
    foreach ($this->record->message()->arguments() as $argument) {
      $key = (string) new DrupalArgumentKey($argument);
      $variables[$key] = (string) $argument;
    }
    $variables['details'] = $this->record->details();
    return $variables;
  }

  public function severity(): int {
    return (new WatchdogFromLevel($this->record->level()))->value();
  }
}

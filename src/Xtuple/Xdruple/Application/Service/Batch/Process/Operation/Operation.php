<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation;

use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ListOperation;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Progress\Progress;
use Xtuple\Xdruple\Application\Service\Log\Record\LogRecord;

interface Operation {
  public function id(): string;

  public function initial(): array;

  public function run(array &$sandbox): Progress;

  public function success(array $results): LogRecord;

  public function failure(array $results, ListOperation $unfinished): LogRecord;
}

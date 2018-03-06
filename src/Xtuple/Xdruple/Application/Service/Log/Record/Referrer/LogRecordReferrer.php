<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Log\Record\Referrer;

interface LogRecordReferrer {
  public function title(): string;

  public function path(): string;

  public function options(): array;
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Collection\ListCSS;
use Xtuple\Xdruple\Application\Service\Batch\Process\Messages\Messages;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ListOperation;

interface Process {
  public function title(): ?Message;

  public function messages(): Messages;

  public function operations(): ListOperation;

  public function css(): ListCSS;

  public function urlOptions(): array;
}

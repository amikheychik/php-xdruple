<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Progress;

use Xtuple\Util\Type\String\Message\Message\Message;

final class ProgressStruct
  implements Progress {
  /** @var int */
  private $completed;
  /** @var int */
  private $total;
  /** @var null|Message */
  private $message;

  public function __construct(int $completed, int $total, ?Message $message = null) {
    $this->completed = $completed;
    $this->total = $total;
    $this->message = $message;
  }

  public function completed(): int {
    return $this->completed;
  }

  public function total(): int {
    return $this->total;
  }

  public function message(): ?Message {
    return $this->message;
  }
}

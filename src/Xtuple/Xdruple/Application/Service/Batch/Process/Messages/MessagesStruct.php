<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process\Messages;

use Xtuple\Util\Type\String\Message\Message\Message;

final class MessagesStruct
  implements Messages {
  /** @var null|Message */
  private $init;
  /** @var null|Message */
  private $progress;
  /** @var null|Message */
  private $error;

  public function __construct(?Message $init = null, ?Message $progress = null, ?Message $error = null) {
    $this->init = $init;
    $this->progress = $progress;
    $this->error = $error;
  }

  public function init(): ?Message {
    return $this->init;
  }

  public function progress(): ?Message {
    return $this->progress;
  }

  public function error(): ?Message {
    return $this->error;
  }
}

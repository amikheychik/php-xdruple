<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Batch\Process;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Collection\ArrayListCSS;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Collection\ListCSS;
use Xtuple\Xdruple\Application\Service\Batch\Process\Messages\Messages;
use Xtuple\Xdruple\Application\Service\Batch\Process\Messages\MessagesStruct;
use Xtuple\Xdruple\Application\Service\Batch\Process\Operation\Collection\ListOperation;

final class ProcessStruct
  implements Process {
  /** @var ListOperation */
  private $operations;
  /** @var null|Message */
  private $title;
  /** @var Messages */
  private $messages;
  /** @var ListCSS */
  private $css;
  /** @var array */
  private $urlOptions;

  public function __construct(ListOperation $operations, ?Message $title = null, ?Messages $messages = null,
                              ?ListCSS $css = null, array $urlOptions = []) {
    $this->operations = $operations;
    $this->title = $title;
    $this->messages = $messages ?: new MessagesStruct();
    $this->css = $css ?: new ArrayListCSS();
    $this->urlOptions = $urlOptions;
  }

  public function operations(): ListOperation {
    return $this->operations;
  }

  public function title(): ?Message {
    return $this->title;
  }

  public function messages(): Messages {
    return $this->messages;
  }

  public function css(): ListCSS {
    return $this->css;
  }

  public function urlOptions(): array {
    return $this->urlOptions;
  }
}

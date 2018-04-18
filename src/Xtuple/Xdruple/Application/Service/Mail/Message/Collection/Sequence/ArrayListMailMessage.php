<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\ArrayList\StrictType\AbstractStrictlyTypedArrayList;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessage;

final class ArrayListMailMessage
  extends AbstractStrictlyTypedArrayList
  implements ListMailMessage {
  /**
   * @throws \Throwable - if the elements are of the wrong type
   *
   * @param MailMessage[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(MailMessage::class, $elements);
  }

  public function append(MailMessage $message): ListMailMessage {
    $elements = [];
    foreach ($this as $element) {
      $elements[] = $element;
    }
    $elements[] = $message;
    /** @noinspection PhpUnhandledExceptionInspection - verified MailMessage type */
    return new ArrayListMailMessage($elements);
  }
}

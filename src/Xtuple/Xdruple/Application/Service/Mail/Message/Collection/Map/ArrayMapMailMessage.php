<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Map;

use Xtuple\Util\Collection\Map\ArrayMap\StrictType\AbstractStrictlyTypedArrayMap;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessage;

final class ArrayMapMailMessage
  extends AbstractStrictlyTypedArrayMap
  implements MapMailMessage {
  /**
   * @param MailMessage[]|iterable $elements
   */
  public function __construct(iterable $elements = []) {
    parent::__construct(MailMessage::class, $elements, 'key');
  }
}

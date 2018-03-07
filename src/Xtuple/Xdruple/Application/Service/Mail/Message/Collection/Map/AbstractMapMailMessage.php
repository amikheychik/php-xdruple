<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Map;

use Xtuple\Util\Collection\Map\AbstractMap;

abstract class AbstractMapMailMessage
  extends AbstractMap
  implements MapMailMessage {
  public function __construct(MapMailMessage $messages) {
    parent::__construct($messages);
  }
}

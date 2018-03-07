<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Map;

use Xtuple\Util\Collection\Map\Map;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessage;

interface MapMailMessage
  extends Map {
  /**
   * @return MailMessage|null
   *
   * @param string $key
   */
  public function get(string $key);

  /**
   * @return MailMessage|null
   */
  public function current();
}

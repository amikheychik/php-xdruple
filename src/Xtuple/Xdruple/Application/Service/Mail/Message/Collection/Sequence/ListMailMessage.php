<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Sequence;

use Xtuple\Util\Collection\Sequence\Sequence;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessage;

interface ListMailMessage
  extends Sequence {
  public function append(MailMessage $message): ListMailMessage;

  /**
   * @param int $key
   *
   * @return MailMessage|null
   */
  public function get(int $key);

  /**
   * @return MailMessage|null
   */
  public function current();
}

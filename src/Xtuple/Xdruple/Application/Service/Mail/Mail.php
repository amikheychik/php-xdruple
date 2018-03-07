<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail;

use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessage;

interface Mail {
  public function send(MailMessage $message);
}

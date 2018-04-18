<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail;

use Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Sequence\ArrayListMailMessage;
use Xtuple\Xdruple\Application\Service\Mail\Message\Collection\Sequence\ListMailMessage;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessage;

final class TestMail
  implements Mail, ListMailMessage {
  /** @var ListMailMessage */
  private $mail;

  public function __construct() {
    /** @noinspection PhpUnhandledExceptionInspection - no arguments passed */
    $this->mail = new ArrayListMailMessage();
  }

  public function send(MailMessage $message) {
    if ($message->to()) {
      $this->append($message);
    }
  }

  public function append(MailMessage $message): ListMailMessage {
    $this->mail = $this->mail->append($message);
    return $this->mail;
  }

  public function get(int $key) {
    return $this->mail->get($key);
  }

  public function isEmpty(): bool {
    return $this->mail->isEmpty();
  }

  public function count() {
    return $this->mail->count();
  }

  public function current() {
    return $this->mail->current();
  }

  public function key() {
    return $this->mail->key();
  }

  public function valid() {
    return $this->mail->valid();
  }

  public function next() {
    $this->mail->next();
  }

  public function rewind() {
    $this->mail->rewind();
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Mail;

use Xtuple\Xdruple\Application\Service\Locale\Language\StdClass\StdClassLanguage;
use Xtuple\Xdruple\Application\Service\Locale\Language\Variable\LanguageDefaultVariable;
use Xtuple\Xdruple\Application\Service\Mail\Message\MailMessage;
use Xtuple\Xdruple\Application\Service\Variable\Variable;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalMail
  implements Mail {
  /** @var Variable */
  private $variable;

  public function __construct(Variable $variable) {
    $this->variable = $variable;
  }

  public function send(MailMessage $message) {
    if ($message->to()) {
      drupal_mail(
        'xdruple',
        $message->key(),
        $message->to(),
        new StdClassLanguage($message->language() ?: new LanguageDefaultVariable($this->variable)),
        [
          'message' => [
            'subject' => $message->subject(),
            'body' => $message->body(),
          ],
        ] + $message->params(),
        $message->from(),
        $message->send()
      );
    }
  }
}

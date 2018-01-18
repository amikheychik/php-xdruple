<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Mail;

use Xtuple\Xdruple\Application\Component\Component;

interface MailComponent
  extends Component {
  public const NAME = 'mail';

  /**
   * @see hook_mail().
   *
   * @param string $key
   * @param array  $message
   * @param array  $params
   */
  public function mail($key, &$message, $params);

  /**
   * @see hook_mail_alter().
   *
   * @param array $message
   */
  public function mailAlter(&$message);
}

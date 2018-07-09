<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token;

use Xtuple\Xdruple\Application\Service\Locale\Language\Language;
use Xtuple\Xdruple\Application\Service\Locale\Language\StdClass\StdClassLanguage;
use Xtuple\Xdruple\Application\Service\Token\Message\Message;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalToken
  implements Token {
  public function process(Message $string, ?Language $language = null, bool $clear = false,
                          bool $sanitize = true): string {
    return (string) token_replace($string->string(), $string->data(), array_filter([
      'language' => $language ? new StdClassLanguage($language) : null,
      'clear' => $clear,
      'sanitize' => $sanitize,
    ]));
  }
}

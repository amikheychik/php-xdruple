<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token;

use Xtuple\Xdruple\Application\Service\Locale\Language\Language;
use Xtuple\Xdruple\Application\Service\Token\Message\Message;

interface Token {
  public function process(Message $string, ?Language $language = null, bool $clear = false,
                          bool $sanitize = true): string;
}

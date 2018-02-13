<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Util\Type\String\Message\Type\Number\NumberMessage;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralMessage;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

interface Locale {
  public function t(string $string, ?Language $to = null): string;

  public function translate(Message $message, ?Language $to = null): string;

  public function plural(PluralMessage $string, ?Language $to = null): string;

  public function number(NumberMessage $number, ?Language $to = null): string;
}

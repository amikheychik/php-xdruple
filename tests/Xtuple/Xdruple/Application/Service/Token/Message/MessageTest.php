<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token\Message;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Locale\Language\Variable\LanguageDefaultVariable;
use Xtuple\Xdruple\Application\Service\Variable\TestVariable;

class MessageTest
  extends TestCase {
  public function testStruct() {
    $language = new LanguageDefaultVariable(new TestVariable());
    $string = new TestTokenString(new MessageStruct('[language:code] is [language:name]', [
      'language' => $language,
    ]));
    self::assertEquals('[language:code] is [language:name]', $string->string());
    self::assertEquals([
      'language' => $language,
    ], $string->data());
  }
}

final class TestTokenString
  extends AbstractMessage {
}

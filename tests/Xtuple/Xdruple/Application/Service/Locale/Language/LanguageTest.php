<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;

class LanguageTest
  extends TestCase {
  public function testStruct() {
    $language = new LanguageStruct('en', 'English', 'English', LanguageDirection::LTR(), true, 0, '', '', '', 0, '');
    self::assertEquals('en', $language->language());
    self::assertEquals('English', $language->name());
    self::assertEquals('English', $language->native());
    self::assertEquals(LanguageDirection::LTR, $language->direction()->value());
    self::assertTrue($language->enabled());
    self::assertEquals(0, $language->plurals());
    self::assertEquals('', $language->formula());
    self::assertEquals('', $language->domain());
    self::assertEquals('', $language->prefix());
    self::assertEquals(0, $language->weight());
    self::assertEquals('', $language->javascript());
  }

  public function testAbstract() {
    $language = new TestLanguage(
      new LanguageStruct('en', 'English', 'English', LanguageDirection::LTR(), true, 0, '', '', '', 0, '')
    );
    self::assertEquals('en', $language->language());
    self::assertEquals('English', $language->name());
    self::assertEquals('English', $language->native());
    self::assertEquals(LanguageDirection::LTR, $language->direction()->value());
    self::assertTrue($language->enabled());
    self::assertEquals(0, $language->plurals());
    self::assertEquals('', $language->formula());
    self::assertEquals('', $language->domain());
    self::assertEquals('', $language->prefix());
    self::assertEquals(0, $language->weight());
    self::assertEquals('', $language->javascript());
  }
}

final class TestLanguage
  extends AbstractLanguage {
}

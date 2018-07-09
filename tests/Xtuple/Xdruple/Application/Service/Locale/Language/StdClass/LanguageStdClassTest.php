<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language\StdClass;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;
use Xtuple\Xdruple\Application\Service\Locale\Language\LanguageStruct;

class LanguageStdClassTest
  extends TestCase {
  public function testLanguage() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $language = new LanguageStdClass((object) [
      'language' => 'en',
      'name' => 'English',
      'native' => 'English',
      'direction' => 0,
      'enabled' => 1,
      'plurals' => 0,
      'formula' => '',
      'domain' => '',
      'prefix' => '',
      'weight' => 0,
      'javascript' => '',
    ]);
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

  public function testStdClass() {
    $language = new StdClassLanguage(
      new LanguageStruct('en', 'English', 'English', LanguageDirection::LTR(), true, 0, '', '', '', 0, '')
    );
    self::assertInstanceOf(\stdClass::class, $language);
    self::assertEquals('en', $language->language);
    self::assertEquals('English', $language->name);
    self::assertEquals('English', $language->native);
    self::assertEquals(0, $language->direction);
    self::assertEquals(1, $language->enabled);
    self::assertEquals(0, $language->plurals);
    self::assertEquals('', $language->formula);
    self::assertEquals('', $language->domain);
    self::assertEquals('', $language->prefix);
    self::assertEquals(0, $language->weight);
    self::assertEquals('', $language->javascript);
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

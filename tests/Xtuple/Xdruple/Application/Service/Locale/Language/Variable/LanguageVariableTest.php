<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language\Variable;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;
use Xtuple\Xdruple\Application\Service\Variable\TestVariable;

class LanguageVariableTest
  extends TestCase {
  public function testDefault() {
    $variable = new TestVariable();
    $language = new LanguageDefaultVariable($variable);
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
    $variable->set('language_default', (object) [
      'language' => 'ru',
      'name' => 'Russian',
      'native' => 'Русский',
      'direction' => 0,
      'enabled' => 1,
      'plurals' => 1,
      'formula' => '',
      'domain' => '',
      'prefix' => '',
      'weight' => 0,
      'javascript' => '',
    ]);
    self::assertEquals('ru', $language->language());
    self::assertEquals('Russian', $language->name());
    self::assertEquals('Русский', $language->native());
    self::assertEquals(LanguageDirection::LTR, $language->direction()->value());
    self::assertTrue($language->enabled());
    self::assertEquals(1, $language->plurals());
    self::assertEquals('', $language->formula());
    self::assertEquals('', $language->domain());
    self::assertEquals('', $language->prefix());
    self::assertEquals(0, $language->weight());
    self::assertEquals('', $language->javascript());
    $variable->set('language_default', (object) [
      'language' => 'en',
      'name' => 'English',
      'native' => 'English',
      'direction' => 2, // invalid value
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
  }
}

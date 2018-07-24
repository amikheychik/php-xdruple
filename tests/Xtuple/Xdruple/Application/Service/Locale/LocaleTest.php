<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Argument\ArgumentStruct;
use Xtuple\Util\Type\String\Message\Argument\Collection\Map\ArrayMapArgument;
use Xtuple\Util\Type\String\Message\Message\MessageStruct;
use Xtuple\Util\Type\String\Message\Type\Number\Currency\CurrencyMessageStruct;
use Xtuple\Util\Type\String\Message\Type\Number\Float\FloatArgument;
use Xtuple\Util\Type\String\Message\Type\Number\Float\FloatMessage;
use Xtuple\Util\Type\String\Message\Type\Number\Integer\IntegerArgument;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralArgumentFromStrings;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralMessageFromStrings;
use Xtuple\Util\Type\String\Message\Type\String\StringArgument;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Service\Locale\Currency\Precision\CurrencyPrecisionStruct;
use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;
use Xtuple\Xdruple\Application\Service\Locale\Language\LanguageStruct;

class LocaleTest
  extends TestCase {
  /** @var Locale */
  private $locale;

  protected function setUp() {
    parent::setUp();
    $this->locale = new TestLocale('en_US', [
      'ru' => [
        'test' => 'тест',
        'one' => 'один',
        'two' => 'два',
        'three' => 'три',
        'integer' => 'целые',
        'float' => 'вещественные',
        'real' => 'вещественное',
        '!one is one, %two is two and @three is three as %float' => '!one это один, %two это два и @three это три как %float',
        '@count !type numbers, not %float' => '@count !type числа, не %float',
        'Pi number is approximately %pi' => 'Число Пи приблизительно равно %pi',
      ],
    ]);
  }

  public function testT() {
    self::assertEquals('test', $this->locale->t('test'));
    self::assertEquals('тест', $this->locale->t('test', $this->language()));
  }

  /**
   * @throws \Throwable
   */
  public function testTranslate() {
    self::assertEquals('test', $this->locale->translate(new StringMessage('test')));
    self::assertEquals('тест', $this->locale->translate(new StringMessage('test'), $this->language()));
    self::assertEquals('Pi number is approximately 3.142', $this->locale->translate(
      new MessageStruct('Pi number is approximately %pi', new ArrayMapArgument([
        new FloatArgument('%pi', M_PI),
      ]))
    ));
    self::assertEquals('Pi number is approximately 3.1416', $this->locale->translate(
      new MessageStruct('Pi number is approximately %pi', new ArrayMapArgument([
        new FloatArgument('%pi', M_PI, '#.0000'),
      ]))
    ));
    self::assertEquals('Число Пи приблизительно равно 3,14159', $this->locale->translate(
      new MessageStruct('Pi number is approximately %pi', new ArrayMapArgument([
        new FloatArgument('%pi', M_PI, '#.0000#'),
      ])),
      $this->language()
    ));
    self::assertEquals('one is one, 2 is two and 3 integer numbers, not float is three for real', $this->locale->translate(
      new MessageStruct('!one is one, %two is two and @three is three for %float', new ArrayMapArgument([
        new StringArgument('!one', 'one'),
        new IntegerArgument('%two', 2),
        new PluralArgumentFromStrings('@three', 3, '{count} {type} numbers, not %float', 'one {type} number', [], new ArrayMapArgument([
          new StringArgument('type', 'integer'),
          new ArgumentStruct('%float', new MessageStruct('{real}', new ArrayMapArgument([
            new StringArgument('real', 'float'),
          ]))),
        ])),
        new ArgumentStruct('%float', new MessageStruct('{real}', new ArrayMapArgument([
          new StringArgument('real', 'real'),
        ]))),
      ]))
    ));
    // Inner arguments and strings are translated automatically
    self::assertEquals('один это один, 2 это два и 3 целые числа, не вещественные это три как вещественное', $this->locale->translate(
      new MessageStruct('!one is one, %two is two and @three is three as %float', new ArrayMapArgument([
        new StringArgument('!one', 'one'),
        new IntegerArgument('%two', 2),
        new PluralArgumentFromStrings('@three', 3, '{count} {type} numbers, not %float', 'one {type} number', [], new ArrayMapArgument([
          new StringArgument('type', 'integer'),
          new ArgumentStruct('%float', new MessageStruct('{real}', new ArrayMapArgument([
            new StringArgument('real', 'float'),
          ]))),
        ])),
        new ArgumentStruct('%float', new MessageStruct('{real}', new ArrayMapArgument([
          new StringArgument('real', 'real'),
        ]))),
      ])),
      $this->language()
    ));
  }

  /**
   * @throws \Throwable
   */
  public function testPluralStrings() {
    self::assertEquals('10 items of apples', $this->locale->plural(
      new PluralMessageFromStrings(10, '{count} items of {something}', 'One item of {something}', [], new ArrayMapArgument([
        new StringArgument('something', 'apples'),
      ])))
    );
    self::assertEquals('One item of apples', $this->locale->plural(
      new PluralMessageFromStrings(1, '{count} items of {something}', 'One item of {something}', [], new ArrayMapArgument([
        new StringArgument('something', 'apples'),
      ]))
    ));
  }

  /**
   * @throws \Throwable
   */
  public function testPluralDrupalStrings() {
    self::assertEquals('10 items of apples', $this->locale->plural(
      new PluralMessageFromStrings(10, '@count items of %something', 'One item of %something', [], new ArrayMapArgument([
        new StringArgument('%something', 'apples'),
      ])))
    );
    self::assertEquals('One item of apples', $this->locale->plural(
      new PluralMessageFromStrings(1, '@count items of %something', 'One item of %something', [], new ArrayMapArgument([
        new StringArgument('%something', 'apples'),
      ]))
    ));
  }

  public function testNumber() {
    self::assertEquals('3,141.593', $this->locale->number(new FloatMessage(M_PI * 1000)));
    self::assertEquals('3 141,593', $this->locale->number(new FloatMessage(M_PI * 1000), $this->language())); // 3&nbsp;141
  }

  public function testCurrency() {
    self::assertEquals('RUB3.14', $this->locale->number(new CurrencyMessageStruct(3.1415, 'RUB')));
    $locale = new TestLocale('en_US', [], new CurrencyPrecisionStruct(4));
    self::assertEquals('RUB3.1415', $locale->number(new CurrencyMessageStruct(3.1415, 'RUB')));
    $locale = new TestLocale('ru_RU', [], new CurrencyPrecisionStruct(4));
    self::assertEquals('3,1415 руб.', $locale->number(new CurrencyMessageStruct(3.1415, 'RUB')));
  }

  private function language(): Language {
    return new LanguageStruct('ru', 'Russian', 'Русский', LanguageDirection::LTR(), true, 0, '', '', '', 0, '');
  }
}

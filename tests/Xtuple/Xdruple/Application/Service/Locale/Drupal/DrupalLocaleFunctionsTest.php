<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Drupal;

use PHPUnit\Framework\TestCase;

class DrupalLocaleFunctionsTest
  extends TestCase {
  /** @var DrupalLocaleTestFunctions */
  private $functions;

  protected function setUp() {
    parent::setUp();
    $this->functions = new DrupalLocaleTestFunctions([
      'ru' => [
        'test' => 'тест',
        'one' => 'один',
        'two' => 'два',
        'three' => 'три',
        'integer' => 'целые',
        'float' => 'вещественные',
        '!one is one, %two is two and @three is three' => '!one это один, %two это два и @three это три',
        '@count !type numbers, not %float' => '@count !type числа, не %float',
        'Pi number is approximately %pi' => 'Число Пи приблизительно равно %pi',
      ],
    ]);
  }

  public function testT() {
    self::assertEquals('test', $this->functions->t('test'));
    self::assertEquals('тест', $this->functions->t('test', [], ['langcode' => 'ru']));
    self::assertEquals('one is one, two is two and three is three', $this->functions->t(
      '!one is one, %two is two and @three is three',
      [
        '!one' => 'one',
        '%two' => 'two',
        '@three' => 'three',
      ]
    ));
    self::assertEquals('one это один, two это два и three это три', $this->functions->t(
      '!one is one, %two is two and @three is three',
      [
        '!one' => 'one',
        '%two' => 'two',
        '@three' => 'three',
      ],
      ['langcode' => 'ru']
    ));
    self::assertEquals('один это один, два это два и три это три', $this->functions->t('!one is one, %two is two and @three is three', [
      '!one' => $this->functions->t('one', [], ['langcode' => 'ru']),
      '%two' => $this->functions->t('two', [], ['langcode' => 'ru']),
      '@three' => $this->functions->t('three', [], ['langcode' => 'ru']),
    ], ['langcode' => 'ru']));
  }

  public function testFormatPlural() {
    self::assertEquals('10 items of apples', $this->functions->formatPlural(
      10,
      'One item of %something',
      '@count items of %something',
      [
        '%something' => 'apples',
      ]
    ));
    self::assertEquals('One item of apples', $this->functions->formatPlural(
      1,
      'One item of %something',
      '@count items of %something',
      [
        '%something' => 'apples',
      ]
    ));
  }
}

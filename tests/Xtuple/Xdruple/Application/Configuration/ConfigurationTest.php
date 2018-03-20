<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\XML\Element\XMLElementString;

class ConfigurationTest
  extends TestCase {
  public function testStruct() {
    $configuration = new ConfigurationStruct([]);
    self::assertEquals([], $configuration->value());
    $configuration = new ConfigurationStruct([
      'timezone' => 'America/New_York',
      'locale' => 'en_US',
    ]);
    self::assertEquals([
      'timezone' => 'America/New_York',
      'locale' => 'en_US',
    ], $configuration->value());
  }

  public function testXMLElement() {
    $configuration = new ConfigurationXMLElement(new XMLElementString('<configuration/>'));
    self::assertEquals([], $configuration->value());
    $configuration = new ConfigurationXMLElement(new XMLElementString(implode('', [
      '<configuration>',
      '<variable name="environment">',
      '\Xtuple\Xdruple\Application\Configuration\Environment\Type\EnvironmentType::DEVELOPMENT',
      '</variable>',
      '<variable name="timezone">America/New_York</variable>',
      '<variable name="locale">en_US</variable>',
      '<variable name="product" type="xml"><Page><Element name="teaser" access="false"/></Page></variable>',
      '<variable name="credit_card">',
      '<type>visa</type><number>4111-1111-1111-1111</number><month>12</month><year>20</year><code>900</code>',
      '</variable>',
      '</configuration>',
    ])));
    self::assertEquals([
      'environment' => 'development',
      'timezone' => 'America/New_York',
      'locale' => 'en_US',
      'product' => '<Page><Element name="teaser" access="false"/></Page>',
      'credit_card' => [
        'type' => 'visa',
        'number' => '4111-1111-1111-1111',
        'month' => '12',
        'year' => '20',
        'code' => '900',
        'name' => 'credit_card',
      ],
    ], $configuration->value());
  }
}

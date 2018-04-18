<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value\XML;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\XML\Element\XMLElementString;

class XMLValueTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testStruct() {
    $value = new XMLValueStruct(null);
    self::assertNull($value->xml());
    self::assertEquals('', $value->value());
    $value = new XMLValueStruct(new XMLElementString('<Page></Page>'));
    self::assertNotNull($value->xml());
    self::assertEquals('<Page/>', (string) $value->xml());
    self::assertEquals('<Page/>', $value->value());
  }

  /**
   * @throws \Throwable
   */
  public function testOptionalXMLElement() {
    $value = new OptionalXMLValueXMLElement(new XMLElementString('<Page>Content</Page>'));
    self::assertFalse($value->isPresent());
    self::assertNull($value->xml());
    self::assertEquals('', $value->value());
    $value = new OptionalXMLValueXMLElement(new XMLElementString('<Variable></Variable>'));
    self::assertTrue($value->isPresent());
    self::assertNull($value->xml());
    self::assertEquals('', $value->value());
    $value = new OptionalXMLValueXMLElement(new XMLElementString(implode('', [
      '<Configuration name="test">',
      '<Page><Element name="teaser" access="false"/></Page>',
      '</Configuration>',
    ])));
    self::assertTrue($value->isPresent());
    self::assertNotNull($value->xml());
    self::assertEquals('<Page><Element name="teaser" access="false"/></Page>', $value->value());
  }

  /**
   * @expectedException \Throwable
   * @expectedExceptionMessage XML element Page is not an XML value
   */
  public function testXMLElement() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $value = new XMLValueXMLElement(new XMLElementString('<Variable></Variable>'));
    self::assertNull($value->xml());
    self::assertEquals('', $value->value());
    /** @noinspection PhpUnhandledExceptionInspection */
    $value = new XMLValueXMLElement(new XMLElementString(implode('', [
      '<Configuration name="test">',
      '<Page><Element name="teaser" access="false"/></Page>',
      '</Configuration>',
    ])));
    self::assertNotNull($value->xml());
    self::assertEquals('<Page><Element name="teaser" access="false"/></Page>', $value->value());
    /** @noinspection PhpUnhandledExceptionInspection */
    new XMLValueXMLElement(new XMLElementString('<Page>Content</Page>'));
  }
}

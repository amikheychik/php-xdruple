<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Application;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\XML\Element\XMLElementString;

class ApplicationTest
  extends TestCase {
  public function testStruct() {
    $application = new ApplicationStruct([]);
    self::assertEquals([], $application->value());
    $application = new ApplicationStruct([
      'timezone' => 'America/New_York',
    ]);
    self::assertEquals([
      'timezone' => 'America/New_York',
    ], $application->value());
  }

  /**
   * @throws \Throwable
   */
  public function testXMLElement() {
    $application = new ApplicationXMLElement(new XMLElementString(implode('', [
      '<application></application>',
    ])));
    self::assertEquals([], $application->value());
    $application = new ApplicationXMLElement(new XMLElementString(implode('', [
      '<application>',
      '<configuration>',
      '<variable name="timezone">America/New_York</variable>',
      '<variable name="locale">en_US</variable>',
      '</configuration>',
      '</application>',
    ])));
    self::assertEquals([
      'timezone' => 'America/New_York',
      'locale' => 'en_US',
    ], $application->value());
  }
}

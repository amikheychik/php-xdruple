<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Drupal;

use PHPUnit\Framework\TestCase;

class DrupalMessageFunctionsTest
  extends TestCase {
  public function testFunctions() {
    $functions = new DrupalMessageTestFunctions();
    self::assertEmpty($functions->drupalGetMessage());
    self::assertEmpty($functions->drupalGetMessage('status'));
    self::assertEmpty($functions->drupalGetMessage('status', false));
    self::assertEmpty($functions->drupalGetMessage(null, false));
    $functions->drupalSetMessage('Test');
    self::assertNotEmpty($functions->drupalGetMessage(null, false));
    self::assertNotEmpty($functions->drupalGetMessage('status', false));
    self::assertEmpty($functions->drupalGetMessage('error'));
    self::assertNotEmpty($functions->drupalGetMessage('status'));
    self::assertEmpty($functions->drupalGetMessage('status'));
    self::assertEmpty($functions->drupalGetMessage());
    $functions->drupalSetMessage('Test', 'error');
    $functions->drupalSetMessage('Test', 'error');
    self::assertCount(2, $functions->drupalGetMessage('error', false)['error']);
    self::assertCount(2, $functions->drupalGetMessage()['error']);
    self::assertEmpty($functions->drupalGetMessage());
  }
}

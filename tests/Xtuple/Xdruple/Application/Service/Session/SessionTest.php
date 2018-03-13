<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Locale\TestLocale;
use Xtuple\Xdruple\Application\Service\Session\Drupal\DrupalMessageTestFunctions;

class SessionTest
  extends TestCase {
  public function testSession() {
    $this->assertions(new TestSession());
    $messages = [];
    $this->assertions(new DrupalSession(
      new TestLocale('en_US'),
      new DrupalMessageTestFunctions($messages)
    ));
  }

  private function assertions(Session $session) {
    self::assertFalse($session->has('test'));
    self::assertNull($session->get('test'));
    self::assertEquals('get', $session->get('test', 'get'));
    self::assertNull($session->set('test', 'set'));
    self::assertTrue($session->has('test'));
    self::assertEquals('set', $session->get('test'));
    self::assertEquals('set', $session->get('test', 'default'));
    self::assertEquals('set', $session->remove('test'));
    self::assertNull($session->get('test'));
    self::assertFalse($session->has('test'));
    self::assertTrue($session->notifications()->isEmpty());
  }
}

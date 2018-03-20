<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\User\User;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\User\TestUser;

class UserTest
  extends TestCase {
  public function testStdClass() {
    $user = new UserStdClass((object) [
      'uid' => '1',
      'mail' => 'example@xtuple.com',
    ]);
    self::assertEquals(1, $user->uid());
    self::assertEquals('example@xtuple.com', $user->email());
    self::assertFalse($user->isAnonymous());
    $user = new UserStdClass((object) []);
    self::assertEquals(0, $user->uid());
    self::assertEquals('', $user->email());
    self::assertTrue($user->isAnonymous());
    $user = new UserStdClass((object) [
      'uid' => 0,
      'mail' => '',
    ]);
    self::assertEquals(0, $user->uid());
    self::assertEquals('', $user->email());
    self::assertTrue($user->isAnonymous());
  }

  public function testActive() {
    $user = new UserActive(new TestUser((object) [
      'uid' => '1',
      'mail' => 'example@xtuple.com',
    ]));
    self::assertEquals(1, $user->uid());
    self::assertEquals('example@xtuple.com', $user->email());
    self::assertFalse($user->isAnonymous());
    $user = new UserActive(new TestUser((object) []));
    self::assertEquals(0, $user->uid());
    self::assertEquals('', $user->email());
    self::assertTrue($user->isAnonymous());
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Type;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\AbstractToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\AbstractChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map\ArrayMapChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map\ArrayMapToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Type\Collection\Map\ArrayMapType;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

class TypeTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testStruct() {
    $types = (new ArrayMapType([
      new TestType(new TypeStruct(
        'site',
        'Site information',
        'Tokens for site-wide settings and other global information.',
        null,
        new ArrayMapToken([
          new TestCommonToken(),
        ])
      )),
    ]))->merge(new ArrayMapType([
      new TestType(new TypeStruct(
        'current-user',
        'Current user',
        'Tokens related to the currently logged in user.',
        'user',
        new ArrayMapToken([
          new TestDataToken(),
        ]),
        new ArrayMapChainToken([
          new TestAuthorToken(),
        ])
      )),
    ]));
    $type = $types->get('site');
    self::assertEquals('site', $type->type());
    self::assertEquals('Site information', $type->name());
    self::assertEquals('Tokens for site-wide settings and other global information.', $type->description());
    self::assertNull($type->data());
    self::assertEquals('xDruple', $type->tokens()->get('name')->replace(null));
    $type = $types->get('current-user');
    self::assertEquals('current-user', $type->type());
    self::assertEquals('Current user', $type->name());
    self::assertEquals('Tokens related to the currently logged in user.', $type->description());
    self::assertEquals('user', $type->data());
    self::assertEquals('1', $type->tokens()->get('uid')->replace((object) ['uid' => 1]));
    self::assertEquals('username1', $type->chained()->get('author')->data((object) ['uid' => 1])->name);
  }
}

final class TestType
  extends AbstractType {
}

final class TestDataToken
  extends AbstractToken {
  public function __construct() {
    parent::__construct('uid', 'User ID', 'The unique ID of the user account.');
  }

  public function replace($user, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return !empty($user->uid) ? (string) $user->uid : 'not yet assigned';
  }
}

final class TestCommonToken
  extends AbstractToken {
  public function __construct() {
    parent::__construct('name', 'Site name', 'The name of the site.');
  }

  public function replace($data, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return 'xDruple';
  }
}

final class TestAuthorToken
  extends AbstractChainToken {
  public function __construct() {
    parent::__construct('author', 'user', 'Author', 'The author of the node.');
  }

  public function data($node, array $context = []) {
    return (object) [
      'uid' => $node->uid,
      'name' => "username{$node->uid}",
    ];
  }

  public function replace($node, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return (string) "User #{$node->uid}";
  }
}

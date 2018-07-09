<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\AbstractToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\AbstractChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\Collection\Map\ArrayMapChainToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Collection\Map\ArrayMapToken;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Type\Collection\Map\ArrayMapType;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Type\TypeStruct;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;
use Xtuple\Xdruple\Application\Service\Token\Message\MessageStruct;

class TokenTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testToken() {
    $token = new TestToken(new ArrayMapType([
      new TypeStruct(
        'site',
        'Site information',
        'Tokens for site-wide settings and other global information.',
        null,
        new ArrayMapToken([
          new TestSiteNameToken(),
        ])
      ),
      new TypeStruct(
        'user',
        'User',
        'Tokens related to individual user accounts.',
        'user',
        new ArrayMapToken([
          new TestUIDToken(),
          new TestUsernameToken(),
        ])
      ),
      new TypeStruct(
        'node',
        'Nodes',
        'Tokens related to individual content items, or "nodes".',
        'node',
        new ArrayMapToken(),
        new ArrayMapChainToken([
          new TestAuthorToken(),
        ])
      ),
    ]));
    self::assertEquals(
      'User [user:email] on [site:slogan]',
      $token->process(new MessageStruct('User [user:email] on [site:slogan]', [
        'user' => (object) ['uid' => 1],
      ]))
    );
    self::assertEquals(
      'User  on ',
      $token->process(new MessageStruct('User [user:email] on [site:slogan]', [
        'user' => (object) ['uid' => 1],
      ]), null, true)
    );
    self::assertEquals(
      'User 1 on xDruple',
      $token->process(new MessageStruct('User [user:uid] on [site:name]', [
        'user' => (object) ['uid' => 1],
      ]))
    );
    self::assertEquals(
      'User {user:uid} on {site:name}',
      $token->process(new MessageStruct('User {user:uid} on {site:name}', [
        'user' => (object) ['uid' => 1],
      ]))
    );
    self::assertEquals(
      'Node author is username1',
      $token->process(new MessageStruct('Node author is [node:author:name]', [
        'node' => (object) ['uid' => 1],
      ]))
    );
  }
}

final class TestAuthorToken
  extends AbstractChainToken {
  public function __construct() {
    /** @noinspection ClassConstantCanBeUsedInspection */
    parent::__construct('author', 'user', 'Author', 'The author of the node.');
  }

  public function data($node, array $context = []) {
    return (object) [
      'uid' => $node->uid,
      'name' => "username{$node->uid}",
    ];
  }

  public function replace($node, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return "User #{$node->uid}";
  }
}

final class TestUsernameToken
  extends AbstractToken {
  public function __construct() {
    parent::__construct('name', 'Name', 'The login name of the user account.');
  }

  public function replace($user, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return !empty($user->name) ? (string) $user->name : 'anonymous';
  }
}

final class TestUIDToken
  extends AbstractToken {
  public function __construct() {
    parent::__construct('uid', 'User ID', 'The unique ID of the user account.');
  }

  public function replace($user, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return !empty($user->uid) ? (string) $user->uid : 'not yet assigned';
  }
}

final class TestSiteNameToken
  extends AbstractToken {
  public function __construct() {
    parent::__construct('name', 'Site name', 'The name of the site.');
  }

  public function replace($data, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return 'xDruple';
  }
}

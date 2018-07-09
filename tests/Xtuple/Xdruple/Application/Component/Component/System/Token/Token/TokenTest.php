<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain\AbstractChainToken;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

class TokenTest
  extends TestCase {
  public function testToken() {
    $token = new TestToken();
    self::assertEquals('uid', $token->token());
    self::assertEquals('User ID', $token->name());
    self::assertEquals('The unique ID of the user account.', $token->description());
    $user = (object) ['uid' => 1];
    self::assertEquals(1, $token->replace($user));
    self::assertEquals('not yet assigned', $token->replace((object) []));
  }

  public function testChained() {
    $token = new TestChainedToken();
    self::assertEquals('author', $token->token());
    /** @noinspection ClassConstantCanBeUsedInspection */
    self::assertEquals('Author', $token->name());
    self::assertEquals('The author of the node.', $token->description());
    self::assertEquals('user', $token->type());
    $node = (object) ['uid' => 1];
    self::assertEquals(1, $token->data($node)->uid);
    self::assertEquals('User ID: 1', $token->replace($node));
  }
}

final class TestToken
  extends AbstractToken {
  public function __construct() {
    parent::__construct('uid', 'User ID', 'The unique ID of the user account.');
  }

  public function replace($user, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return !empty($user->uid) ? (string) $user->uid : 'not yet assigned';
  }
}

final class TestChainedToken
  extends AbstractChainToken {
  public function __construct() {
    /** @noinspection ClassConstantCanBeUsedInspection */
    parent::__construct('author', 'user', 'Author', 'The author of the node.');
  }

  public function data($node, array $context = []) {
    return (object) [
      'uid' => $node->uid,
    ];
  }

  public function replace($node, array $context = [], ?Language $language = null, bool $sanitize = true): string {
    return "User ID: {$node->uid}";
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Message;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Type\String\StringArgument;

class DrupalArgumentKeyTest
  extends TestCase {
  public function testPassthrough() {
    $key = new DrupalArgumentKey(new StringArgument('test', 'Test'));
    self::assertEquals('!test', $key->__toString());
    $key = new DrupalArgumentKey(new StringArgument('{test}', 'Test'));
    self::assertEquals('!test', $key->__toString());
    $key = new DrupalArgumentKey(new StringArgument('#test', 'Test'));
    self::assertEquals('!#test', $key->__toString());
  }

  public function testCompatibility() {
    $key = new DrupalArgumentKey(new StringArgument('!test', 'Test'));
    self::assertEquals('!test', $key->__toString());
    $key = new DrupalArgumentKey(new StringArgument('@test', 'Test'));
    self::assertEquals('@test', $key->__toString());
    $key = new DrupalArgumentKey(new StringArgument('%test', 'Test'));
    self::assertEquals('%test', $key->__toString());
  }
}

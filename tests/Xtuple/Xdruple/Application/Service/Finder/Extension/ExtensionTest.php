<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Type;

class ExtensionTest
  extends TestCase {
  public function testStruct() {
    $extension = new TestExtension(new ExtensionStruct(
      Type::MODULE(),
      'xdruple'
    ));
    self::assertEquals('xdruple', $extension->name());
    self::assertTrue($extension->type()->isModule());
  }
}

final class TestExtension
  extends AbstractExtension {
}

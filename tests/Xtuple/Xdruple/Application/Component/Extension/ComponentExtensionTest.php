<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Extension;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Extension\Collection\Sequence\ArrayListComponentExtension;

class ComponentExtensionTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testAbstract() {
    $components = (new ArrayListComponentExtension([
      new TestComponentExtension('xdruple'),
    ]))->append(new TestComponentExtension('test'));
    self::assertEquals('xdruple', $components->get(0)->component());
    self::assertEquals('test', $components->get(1)->component());
  }
}

final class TestComponentExtension
  extends AbstractComponentExtension {
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Extension\AbstractComponentExtension;
use Xtuple\Xdruple\Application\Component\Extension\ComponentExtension;

class ComponentTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Component xdruple extensions are not supported
   */
  public function testAbstract() {
    $component = new TestComponent('test', 'system', ['system'], ComponentExtension::class, 'xdruple');
    self::assertEquals('test', $component->name());
    self::assertEquals('xdruple', $component->module());
    self::assertEquals('components/system/test.inc', $component->file());
    self::assertEquals(['system'], $component->dependencies());
    $component->extend(new TestComponentExtension('test'));
    $component = new TestComponent('test', 'system');
    self::assertEquals([], $component->dependencies());
    $component->extend(new TestComponentExtension('xdruple'));
  }
}

final class TestComponent
  extends AbstractComponent {
}

final class TestComponentExtension
  extends AbstractComponentExtension {
}

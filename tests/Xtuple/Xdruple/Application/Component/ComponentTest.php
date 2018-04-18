<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Extension\AbstractComponentExtension;

class ComponentTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testAbstract() {
    $component = new TestComponent('test', 'system', ['system'], TestComponentExtension::class, 'xdruple');
    self::assertEquals('test', $component->name());
    self::assertEquals('xdruple', $component->module());
    self::assertEquals('components/system/test.inc', $component->file());
    self::assertEquals(['system'], $component->dependencies());
    $component->extend(new TestComponentExtension('test'));
    try {
      $component->extend(new TestDifferentComponentExtension('test'));
    }
    catch (\Throwable $e) {
      self::assertContains(
        'Failed to extend component system with extension Xtuple\Xdruple\Application\Component\TestDifferentComponentExtension',
        $e->getMessage()
      );
    }
    finally {
      if (!isset($e)) {
        self::fail('Failed to extend component extension is not thrown');
      }
      unset($e);
    }
    $component = new TestComponent('test', 'system');
    self::assertEquals([], $component->dependencies());
    try {
      $component->extend(new TestComponentExtension('xdruple'));
    }
    catch (\Throwable $e) {
      self::assertEquals('Component xdruple extensions are not supported', $e->getMessage());
    }
    finally {
      if (!isset($e)) {
        self::fail('"Component xdruple extensions are not supported" is not thrown');
      }
      unset($e);
    }
  }
}

final class TestComponent
  extends AbstractComponent {
}

final class TestComponentExtension
  extends AbstractComponentExtension {
}

final class TestDifferentComponentExtension
  extends AbstractComponentExtension {
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Path;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\EnginePath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\LibraryPath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\ModulePath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\ProfilePath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Path\Type\ThemePath;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Module\Module;

class PathTest
  extends TestCase {
  public function testStruct() {
    $path = new TestPath(new PathStruct(
      new Module('xdruple')
    ));
    self::assertEquals('module', $path->extension()->type()->value());
    self::assertEquals('xdruple', $path->extension()->name());
    self::assertNull($path->relative());
    $path = new TestPath(new PathStruct(
      new Module('xdruple'),
      'xdruple.install'
    ));
    self::assertEquals('xdruple.install', $path->relative());
  }

  public function testEnginePath() {
    $path = new EnginePath('phptemplate');
    self::assertTrue($path->extension()->type()->isEngine());
    self::assertEquals('phptemplate', $path->extension()->name());
    self::assertNull($path->relative());
    $path = new EnginePath('phptemplate', 'phptemplate.engine');
    self::assertEquals('phptemplate.engine', $path->relative());
  }

  public function testLibraryPath() {
    $path = new LibraryPath('bootstrap3');
    self::assertTrue($path->extension()->type()->isLibrary());
    self::assertEquals('bootstrap3', $path->extension()->name());
    self::assertNull($path->relative());
    $path = new LibraryPath('bootstrap3', 'bootstrap3/assets');
    self::assertEquals('bootstrap3/assets', $path->relative());
  }

  public function testModulePath() {
    $path = new ModulePath('xdruple');
    self::assertTrue($path->extension()->type()->isModule());
    self::assertEquals('xdruple', $path->extension()->name());
    self::assertNull($path->relative());
    $path = new ModulePath('xdruple', 'xdruple.module');
    self::assertEquals('xdruple.module', $path->relative());
  }

  public function testProfilePath() {
    $path = new ProfilePath('minimal');
    self::assertTrue($path->extension()->type()->isProfile());
    self::assertEquals('minimal', $path->extension()->name());
    self::assertNull($path->relative());
    $path = new ProfilePath('minimal', 'minimal.install');
    self::assertEquals('minimal.install', $path->relative());
  }

  public function testThemePath() {
    $path = new ThemePath('seven');
    self::assertTrue($path->extension()->type()->isTheme());
    self::assertEquals('seven', $path->extension()->name());
    self::assertNull($path->relative());
    $path = new ThemePath('seven', 'template.php');
    self::assertEquals('template.php', $path->relative());
  }
}

final class TestPath
  extends AbstractPath {
}

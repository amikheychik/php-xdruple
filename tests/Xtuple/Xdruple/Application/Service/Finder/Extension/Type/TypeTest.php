<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Extension\Type;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Engine\Engine;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Library\Library;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Module\Module;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Profile\Profile;
use Xtuple\Xdruple\Application\Service\Finder\Extension\Type\Theme\Theme;

class TypeTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Value `resource` is not supported
   */
  public function testEnum() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $type = new Type('library');
    self::assertTrue($type->is(Type::LIBRARY));
    /** @noinspection PhpUnhandledExceptionInspection */
    new Type('resource');
  }

  public function testEngine() {
    $type = Type::ENGINE();
    self::assertEquals('theme_engine', $type->value());
    self::assertTrue($type->isEngine());
    self::assertFalse($type->isLibrary());
    self::assertFalse($type->isModule());
    self::assertFalse($type->isProfile());
    self::assertFalse($type->isTheme());
    $engine = new Engine('phptemplate');
    self::assertEquals('phptemplate', $engine->name());
    self::assertTrue($engine->type()->isEngine());
  }

  public function testLibrary() {
    $type = Type::LIBRARY();
    self::assertEquals('library', $type->value());
    self::assertFalse($type->isEngine());
    self::assertTrue($type->isLibrary());
    self::assertFalse($type->isModule());
    self::assertFalse($type->isProfile());
    self::assertFalse($type->isTheme());
    $library = new Library('bootstrap3');
    self::assertEquals('bootstrap3', $library->name());
    self::assertTrue($library->type()->isLibrary());
  }

  public function testModule() {
    $type = Type::MODULE();
    self::assertEquals('module', $type->value());
    self::assertFalse($type->isEngine());
    self::assertFalse($type->isLibrary());
    self::assertTrue($type->isModule());
    self::assertFalse($type->isProfile());
    self::assertFalse($type->isTheme());
    $module = new Module('xdruple');
    self::assertEquals('xdruple', $module->name());
    self::assertTrue($module->type()->isModule());
  }

  public function testProfile() {
    $type = Type::PROFILE();
    self::assertEquals('profile', $type->value());
    self::assertFalse($type->isEngine());
    self::assertFalse($type->isLibrary());
    self::assertFalse($type->isModule());
    self::assertTrue($type->isProfile());
    self::assertFalse($type->isTheme());
    $profile = new Profile('minimal');
    self::assertEquals('minimal', $profile->name());
    self::assertTrue($profile->type()->isProfile());
  }

  public function testTheme() {
    $type = Type::THEME();
    self::assertEquals('theme', $type->value());
    self::assertFalse($type->isEngine());
    self::assertFalse($type->isLibrary());
    self::assertFalse($type->isModule());
    self::assertFalse($type->isProfile());
    self::assertTrue($type->isTheme());
    $theme = new Theme('seven');
    self::assertEquals('seven', $theme->name());
    self::assertTrue($theme->type()->isTheme());
  }
}

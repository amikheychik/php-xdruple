<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Exception\Exception;
use Xtuple\Util\File\Directory\Directory;
use Xtuple\Util\File\Directory\PackageDirectory;
use Xtuple\Util\File\Directory\RelativeDirectory;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type\EnginePathFinder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type\LibraryPathFinder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type\ModulePathFinder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type\ProfilePathFinder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Finder\Type\ThemePathFinder;
use Xtuple\Xdruple\Application\Service\Finder\Path\Path;

class TestFinderTest
  extends TestCase {
  /** @var Directory */
  private $root;
  /** @var Finder */
  private $finder;

  /**
   * @throws Exception
   */
  public function setUp() {
    parent::setUp();
    $this->root = new RelativeDirectory(
      new PackageDirectory(__NAMESPACE__, __DIR__),
      'vendor/drupal/drupal'
    );
    $this->finder = new TestFinder($this->root);
  }

  public function testFinder() {
    $this->assert(new EnginePathFinder($this->finder, 'phptemplate'), 'themes/engines/phptemplate');
    $this->assert(
      new EnginePathFinder($this->finder, 'phptemplate', 'phptemplate.engine'),
      'themes/engines/phptemplate/phptemplate.engine'
    );
    $this->assert(new LibraryPathFinder($this->finder, 'bootstrap3'), '');
    $this->assert(new LibraryPathFinder($this->finder, 'bootstrap3', 'assets'), '');
    $this->assert(new ModulePathFinder($this->finder, 'system'), 'modules/system');
    $this->assert(new ModulePathFinder($this->finder, 'system', 'system.info'), 'modules/system/system.info');
    $this->assert(new ProfilePathFinder($this->finder, 'minimal'), 'profiles/minimal');
    $this->assert(
      new ProfilePathFinder($this->finder, 'minimal', 'minimal.install'),
      'profiles/minimal/minimal.install'
    );
    $this->assert(new ThemePathFinder($this->finder, 'seven'), 'themes/seven');
    $this->assert(new ThemePathFinder($this->finder, 'seven', 'template.php'), 'themes/seven/template.php');
  }

  private function assert(Path $path, string $relative): void {
    self::assertEquals($relative, $path->relative());
    self::assertEquals(
      $relative
        ? "{$this->root->path()->absolute()}/{$relative}"
        : '',
      $path->absolute()
    );
  }
}

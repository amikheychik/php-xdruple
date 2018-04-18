<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Loader;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Application;
use Xtuple\Xdruple\Application\Component\Component;

class ApplicationLoaderTest
  extends TestCase {
  private $configPath = '/tmp/phpunit/xdruple';

  /**
   * @expectedException \Throwable
   * @expectedExceptionMessage Failed to prepare Application loader
   */
  public function testDrupal() {
    $this->setUp();
    /** @noinspection PhpUnhandledExceptionInspection */
    $loader = new DrupalApplicationLoader($this->configPath);
    self::assertEquals(TestApplication::class, get_class($loader->application()));
    unset($GLOBALS['databases']);
    /** @noinspection PhpUnhandledExceptionInspection */
    new DrupalApplicationLoader($this->configPath);
  }

  protected function setUp() {
    parent::setUp();
    $GLOBALS['databases'] = [
      'default' => [
        'default' => [
          'database' => 'phpunit',
          'username' => 'phpunit',
          'password' => 'phpunit',
          'host' => 'localhost',
          'port' => '5432',
          'driver' => 'pgsql',
          'prefix' => '',
        ],
      ],
    ];
    $sourcePath = realpath(dirname(__FILE__) . '/../../../../../resource/schema');
    if (!file_exists("{$this->configPath}/application")) {
      mkdir("{$this->configPath}/application", 0777, true);
    }
    copy("{$sourcePath}/application.xml", "{$this->configPath}/application/application.xml");
    copy("{$sourcePath}/environment.xml", "{$this->configPath}/application/environment.xml");
    $xml = file_get_contents("{$this->configPath}/application/application.xml");
    $xml = str_replace(
      '\Xtuple\Xdruple\Application\Application',
      '\Xtuple\Xdruple\Application\Loader\TestApplication',
      $xml
    );
    file_put_contents("{$this->configPath}/application/application.xml", $xml);
  }

  protected function tearDown() {
    parent::tearDown();
    unset($GLOBALS['databases']);
    unlink("{$this->configPath}/application/application.xml");
    unlink("{$this->configPath}/application/environment.xml");
  }
}

final class TestApplication
  implements Application {
  public function component(string $name): ?Component {
    return null;
  }

  public function update(?int $version): string {
    return (string) $version;
  }
}

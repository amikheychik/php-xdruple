<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment\Databases;

use PHPUnit\Framework\TestCase;

class DatabasesTest
  extends TestCase {
  /**
   * @expectedException \Xtuple\Util\Exception\Exception
   * @expectedExceptionMessage Databases configuration is not set
   */
  public function testGlobal() {
    $databases = [
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
    $GLOBALS['databases'] = $databases;
    /** @noinspection PhpUnhandledExceptionInspection */
    $value = new DatabasesGlobals();
    self::assertEquals($databases, $value->value());
    unset($GLOBALS['databases']);
    $GLOBALS['install']['databases'] = $databases;
    /** @noinspection PhpUnhandledExceptionInspection */
    $value = new DatabasesGlobals();
    self::assertEquals($databases, $value->value());
    unset($GLOBALS['install']);
    /** @noinspection PhpUnhandledExceptionInspection */
    new DatabasesGlobals();
  }
}

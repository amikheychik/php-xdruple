<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\XML\Element\XMLElementString;
use Xtuple\Xdruple\Application\Configuration\Environment\Databases\DatabasesArray;
use Xtuple\Xdruple\Application\Configuration\Environment\Type\EnvironmentType;

class EnvironmentTest
  extends TestCase {
  public function testStruct() {
    $environment = new EnvironmentStruct(EnvironmentType::DEVELOPMENT(), new DatabasesArray($this->databases()), []);
    self::assertEquals(EnvironmentType::DEVELOPMENT, $environment->type()->value());
    self::assertEquals($this->databases(), $environment->databases()->value());
    self::assertEquals([
      'environment' => 'development',
      'databases' => $this->databases(),
    ], $environment->value());
    $environment = new EnvironmentStruct(EnvironmentType::DEVELOPMENT(), new DatabasesArray($this->databases()), [
      'environment' => 'stage',
      'databases' => [],
    ]);
    self::assertEquals([
      'environment' => 'development',
      'databases' => $this->databases(),
    ], $environment->value());
    $environment = new EnvironmentStruct(EnvironmentType::DEVELOPMENT(), new DatabasesArray($this->databases()), [
      'timezone' => 'America/New_York',
    ]);
    self::assertEquals([
      'environment' => 'development',
      'databases' => $this->databases(),
      'timezone' => 'America/New_York',
    ], $environment->value());
  }

  public function testXMLElement() {
    /** @noinspection PhpUnhandledExceptionInspection */
    $environment = new EnvironmentXMLElement(new XMLElementString(implode('', [
      '<environment type="development">',
      '</environment>',
    ])), new DatabasesArray($this->databases()));
    self::assertEquals(EnvironmentType::DEVELOPMENT, $environment->type()->value());
    self::assertEquals($this->databases(), $environment->databases()->value());
    self::assertEquals([
      'environment' => 'development',
      'databases' => $this->databases(),
    ], $environment->value());
    /** @noinspection PhpUnhandledExceptionInspection */
    $environment = new EnvironmentXMLElement(new XMLElementString(implode('', [
      '<environment type="development">',
      '<configuration>',
      '<variable name="timezone">America/New_York</variable>',
      '<variable name="country">US</variable>',
      '</configuration>',
      '</environment>',
    ])), new DatabasesArray($this->databases()));
    self::assertEquals([
      'environment' => 'development',
      'databases' => $this->databases(),
      'timezone' => 'America/New_York',
      'country' => 'US',
    ], $environment->value());
    try {
      new EnvironmentXMLElement(new XMLElementString(implode('', [
        '<environment type="missing">',
        '</environment>',
      ])), new DatabasesArray($this->databases()));
    }
    catch (\Throwable $e) {
      self::assertEquals('Failed to parse environment XML information', $e->getMessage());
    }
    finally {
      if (!isset($e)) {
        self::fail('Environment XML exception is not thrown');
      }
      unset($e);
    }
  }

  private function databases(): array {
    return [
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
  }
}

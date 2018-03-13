<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment\Type;

use PHPUnit\Framework\TestCase;

class EnvironmentTypeTest
  extends TestCase {
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Value `dev` is not supported
   */
  public function testEnum() {
    $type = EnvironmentType::DEVELOPMENT();
    self::assertEquals(EnvironmentType::DEVELOPMENT, $type->value());
    self::assertTrue($type->is(EnvironmentType::DEVELOPMENT));
    self::assertTrue($type->isDevelopment());
    self::assertFalse($type->isStage());
    self::assertFalse($type->isProduction());
    $type = EnvironmentType::STAGE();
    self::assertEquals(EnvironmentType::STAGE, $type->value());
    self::assertTrue($type->is(EnvironmentType::STAGE));
    self::assertFalse($type->isDevelopment());
    self::assertTrue($type->isStage());
    self::assertFalse($type->isProduction());
    $type = EnvironmentType::PRODUCTION();
    self::assertEquals(EnvironmentType::PRODUCTION, $type->value());
    self::assertTrue($type->is(EnvironmentType::PRODUCTION));
    self::assertFalse($type->isDevelopment());
    self::assertFalse($type->isStage());
    self::assertTrue($type->isProduction());
    /** @noinspection PhpUnhandledExceptionInspection */
    new EnvironmentType('dev');
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration;

use PHPUnit\Framework\TestCase;

class ConfigurationTest
  extends TestCase {
  public function testGet() {
    $config = new TestConfiguration([
      'environment' => 'development',
    ]);
    self::assertEquals('development', $config->get('environment'));
    self::assertNull($config->get('site_frontpage'));
    self::assertEquals('products', $config->get('site_frontpage', 'products'));
  }
}

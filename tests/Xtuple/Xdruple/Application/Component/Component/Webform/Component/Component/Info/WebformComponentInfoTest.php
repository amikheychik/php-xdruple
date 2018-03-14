<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\Features\WebformComponentFeaturesStruct;

class WebformComponentInfoTest
  extends TestCase {
  public function testStruct() {
    $features = new WebformComponentFeaturesStruct();
    $info = new WebformComponentInfoStruct('Test', 'Test component info', $features);
    self::assertEquals('Test', $info->label());
    self::assertEquals('Test component info', $info->description());
    self::assertTrue($features === $info->features());
    self::assertEquals('string', $info->conditionalType());
  }
}

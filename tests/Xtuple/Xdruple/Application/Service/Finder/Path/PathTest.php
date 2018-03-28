<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Path;

use PHPUnit\Framework\TestCase;

class PathTest
  extends TestCase {
  public function testStruct() {
    $path = new TestPath(new PathStruct('includes/common.inc', '/var/www/drupal/includes/common.inc'));
    self::assertEquals('includes/common.inc', $path->relative());
    self::assertEquals('/var/www/drupal/includes/common.inc', $path->absolute());
  }

  public function testDrupal() {
    $path = new DrupalPath('includes/common.inc');
    self::assertEquals('includes/common.inc', $path->relative());
  }
}

final class TestPath
  extends AbstractPath {
}

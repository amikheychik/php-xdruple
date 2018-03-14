<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Finder\Package;

use PHPUnit\Framework\TestCase;

class PackageTest
  extends TestCase {
  public function testStruct() {
    $package = new TestPackage(new PackageStruct('library', 'path/to/package'));
    self::assertEquals('library', $package->type());
    self::assertEquals('path/to/package', $package->path());
  }
}

final class TestPackage
  extends AbstractPackage {
}

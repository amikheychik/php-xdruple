<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroupSystem;
use Xtuple\Xdruple\Application\Service\Finder\Package\PackageStruct;

class CSSTest
  extends TestCase {
  public function testStruct() {
    $css = new TestCSS(new CSSStruct());
    self::assertNull($css->data());
    self::assertNull($css->options());
    $css = new TestCSS(new CSSStruct('test.css', [
      'group' => 0,
    ]));
    self::assertEquals('test.css', $css->data());
    self::assertEquals([
      'group' => 0,
    ], $css->options());
    $css = new TestCSS(new CSSStruct([
      'xdruple' => [],
    ], [
      'type' => 'setting',
    ]));
    self::assertEquals([
      'xdruple' => [],
    ], $css->data());
    self::assertEquals([
      'type' => 'setting',
    ], $css->options());
  }

  public function testFile() {
    $css = new CSSFile(new PackageStruct('library', 'path/to/library'), 'css/test.css');
    self::assertEquals('path/to/library/css/test.css', $css->data());
    self::assertEquals([
      'type' => 'file',
      'group' => 0,
    ], $css->options());
    $css = new CSSFile(new PackageStruct('library', 'path/to/library'), 'css/test.css', new CSSGroupSystem(), [
      'type' => 'setting',
      'preprocess' => true,
    ]);
    self::assertEquals([
      'type' => 'file',
      'group' => -100,
      'preprocess' => true,
    ], $css->options());
  }
}

final class TestCSS
  extends AbstractCSS {
  public function __construct(CSS $css) {
    parent::__construct($css);
  }
}

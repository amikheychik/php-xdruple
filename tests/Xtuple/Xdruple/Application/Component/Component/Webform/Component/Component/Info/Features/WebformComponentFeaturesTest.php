<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\Features;

use PHPUnit\Framework\TestCase;

class WebformComponentFeaturesTest
  extends TestCase {
  public function testStruct() {
    $features = new WebformComponentFeaturesStruct();
    self::assertTrue($features->analysis());
    self::assertTrue($features->csv());
    self::assertTrue($features->defaultValue());
    self::assertTrue($features->description());
    self::assertTrue($features->email());
    self::assertFalse($features->emailAddress());
    self::assertFalse($features->emailName());
    self::assertTrue($features->required());
    self::assertTrue($features->title());
    self::assertTrue($features->titleDisplay());
    self::assertTrue($features->titleInline());
    self::assertTrue($features->conditional());
    self::assertFalse($features->group());
    self::assertFalse($features->spamAnalysis());
    self::assertFalse($features->attachment());
    self::assertFalse($features->viewsRange());
    self::assertTrue($features->canBePrivate());
    self::assertFalse($features->placeholder());
    self::assertTrue($features->wrapperClasses());
    self::assertTrue($features->cssClasses());
  }
}

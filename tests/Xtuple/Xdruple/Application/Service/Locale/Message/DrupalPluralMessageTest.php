<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Message;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Argument\Collection\Set\ArraySetArgument;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralMessageFromStrings;
use Xtuple\Util\Type\String\Message\Type\String\StringArgument;

class DrupalPluralMessageTest
  extends TestCase {
  public function testConstructor() {
    $message = new DrupalPluralMessage(new PluralMessageFromStrings(10.5, '@count {type} %items', 'One {type} %item', [
      '=0' => 'No {type} %items',
    ], new ArraySetArgument([
      new StringArgument('type', 'test'),
      new StringArgument('%item', 'item'),
      new StringArgument('%items', 'items'),
    ]), 1));
    // Drupal-style parameters are not recognized to format
    self::assertEquals('@count test %items', $message->__toString());
    self::assertEquals('@count test %items', $message->format('ru_RU'));
    // Additional plural forms are not processed
    self::assertEquals('No {type} %items', $message->plurals()->get('=0')->template());
    self::assertEquals('@count !type %items', $message->plural()->template());
    self::assertEquals('One !type %item', $message->singular()->template());
    // Plural is a default template
    self::assertEquals('@count !type %items', $message->template());
    // Count as a string
    self::assertEquals('10.5', $message->count()->template());
    // Retrieving arguments by key
    self::assertEquals('test', $message->arguments()->get('type')->__toString());
    self::assertEquals('item', $message->arguments()->get('%item')->__toString());
    self::assertEquals(1, $message->offset());
  }
}

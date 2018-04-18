<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Message;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Argument\Collection\Map\ArrayMapArgument;
use Xtuple\Util\Type\String\Message\Message\MessageStruct;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralArgumentFromStrings;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralMessage;
use Xtuple\Util\Type\String\Message\Type\String\StringArgument;

class DrupalMessageTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testCompatibility() {
    $message = new DrupalMessage(
      new MessageStruct('%extension file upload @status. See !logs and {results}.', new ArrayMapArgument([
        new StringArgument('%extension', 'CSV'),
        new StringArgument('@status', 'successful'),
        new StringArgument('!logs', '<a href="/logs">logs</a>'),
        new StringArgument('results', '<a href="/results">results</a>'),
      ]))
    );
    self::assertEquals('%extension file upload @status. See !logs and !results.', $message->template());
    self::assertEquals(
      'CSV file upload successful. See <a href="/logs">logs</a> and <a href="/results">results</a>.',
      $message->__toString()
    );
  }

  /**
   * @throws \Throwable
   */
  public function testArguments() {
    $message = new MessageStruct('{extension} file upload {status}.', new ArrayMapArgument([
      new StringArgument('extension', 'CSV'),
      new StringArgument('status', 'successful'),
    ]));
    $drupal = new DrupalMessage($message);
    self::assertEquals('!extension file upload !status.', $drupal->template());
    self::assertEquals('CSV file upload successful.', $message->__toString());
  }

  /**
   * @throws \Throwable
   */
  public function testPluralArguments() {
    $message = new MessageStruct('{lines} processed and {users} updated.', new ArrayMapArgument([
      new PluralArgumentFromStrings('lines', 10, '{count} lines', 'One line'),
      new PluralArgumentFromStrings('users', 2, '{count} users', 'One user {name}', [], new ArrayMapArgument([
        new StringArgument('name', 'Developer'),
      ])),
    ]));
    $drupal = new DrupalMessage($message);
    self::assertEquals('!lines processed and !users updated.', $drupal->template());
    /** @var PluralMessage $plural */
    $plural = $drupal->arguments()->get('lines');
    $plural = new DrupalPluralMessage($plural);
    self::assertEquals('10', $plural->count()->template());
    self::assertEquals('One line', $plural->singular()->template());
    self::assertEquals('@count lines', $plural->plural()->template());
    /** @var PluralMessage $plural */
    $plural = $drupal->arguments()->get('users');
    $plural = new DrupalPluralMessage($plural);
    self::assertEquals('2', $plural->count()->template());
    self::assertEquals('One user !name', $plural->singular()->template());
    self::assertEquals('@count users', $plural->plural()->template());
    self::assertNotNull($plural->arguments()->get('name'));
  }
}

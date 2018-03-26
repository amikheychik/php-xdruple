<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Record;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Cache\Key\KeyStruct;
use Xtuple\Util\Type\DateTime\DateTimeString;
use Xtuple\Util\Type\DateTime\Timestamp\TimestampDateTime;
use Xtuple\Xdruple\Application\Service\Cache\Bin\Drupal\Key\Key;
use Xtuple\Xdruple\Application\Service\Cache\Lifetime\Cache;

class RecordTest
  extends TestCase {
  public function testStruct() {
    $data = (object) ['user' => 1];
    $record = new RecordStruct(new KeyStruct(['field', 'node', 1]), $data);
    self::assertEquals('field:node:1', (string) $record->key());
    self::assertTrue($record->key() instanceof Key);
    self::assertEquals($data, $record->value());
    self::assertEquals(0, $record->expire());
    self::assertFalse($record->expired());
    self::assertNull($record->expiresAt());
    $record = new RecordStruct(new KeyStruct(['field', 'node', 1]), $data, Cache::TEMPORARY);
    self::assertEquals(-1, $record->expire());
    self::assertFalse($record->expired());
    self::assertNull($record->expiresAt());
    $expire = time() - 3600;
    $record = new RecordStruct(new KeyStruct(['field', 'node', 1]), $data, $expire);
    self::assertEquals($expire, $record->expire());
    self::assertTrue($record->expired());
    self::assertEquals($expire, (new TimestampDateTime($record->expiresAt()))->seconds());
    $expire = time() + 3600;
    $record = new RecordStruct(new KeyStruct(['field', 'node', 1]), $data, $expire);
    self::assertFalse($record->expired());
  }

  public function testFromRecord() {
    $data = (object) ['user' => 1];
    $record = new RecordFromRecord(new \Xtuple\Util\Cache\Record\RecordStruct(
      new KeyStruct(['field', 'node', 1]),
      $data
    ));
    self::assertEquals('field:node:1', (string) $record->key());
    self::assertTrue($record->key() instanceof Key);
    self::assertEquals($data, $record->value());
    self::assertEquals(0, $record->expire());
    self::assertFalse($record->expired());
    self::assertNull($record->expiresAt());
    $expire = new DateTimeString('-1 hour');
    $record = new RecordFromRecord(new \Xtuple\Util\Cache\Record\RecordStruct(
      new KeyStruct(['field', 'node', 1]),
      $data,
      $expire
    ));
    self::assertEquals((new TimestampDateTime($expire))->seconds(), $record->expire());
    self::assertTrue($record->expired());
    self::assertTrue($record->expiresAt()->equals($expire));
    $expire = new DateTimeString('+1 hour');
    $record = new RecordFromRecord(new \Xtuple\Util\Cache\Record\RecordStruct(
      new KeyStruct(['field', 'node', 1]),
      $data,
      $expire
    ));
    self::assertFalse($record->expired());
  }

  /**
   * @see cache_get()
   */
  public function testRecordFromData() {
    $data = (object) [
      'cid' => 'field:node:1',
      'data' => ['user' => 1],
      'expire' => (string) Cache::PERMANENT,
    ];
    $record = new RecordFromCache($data);
    self::assertEquals('field:node:1', (string) $record->key());
    self::assertEquals(['field', 'node', '1'], $record->key()->fields());
    self::assertEquals(1, $record->value()['user']);
    self::assertEquals(0, $record->expire());
    self::assertFalse($record->expired());
    self::assertNull($record->expiresAt());
    $data = (object) [
      'cid' => 'field:node:1',
      'data' => ['user' => 1],
      'expire' => (string) Cache::TEMPORARY,
    ];
    $record = new RecordFromCache($data);
    self::assertEquals(-1, $record->expire());
    self::assertFalse($record->expired());
    self::assertNull($record->expiresAt());
    $expire = time() - 3600;
    $data = (object) [
      'cid' => 'field:node:1',
      'data' => ['user' => 1],
      'expire' => (string) $expire,
    ];
    $record = new RecordFromCache($data);
    self::assertEquals($expire, (new TimestampDateTime($record->expiresAt()))->seconds());
    self::assertTrue($record->expired());
    $expire = time() + 3600;
    $data = (object) [
      'cid' => 'field:node:1',
      'data' => ['user' => 1],
      'expire' => (string) $expire,
    ];
    $record = new RecordFromCache($data);
    self::assertFalse($record->expired());
  }
}

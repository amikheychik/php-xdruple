<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Session\Notification\Collection\Sequence;

use PHPUnit\Framework\TestCase;
use Xtuple\Xdruple\Application\Service\Locale\TestLocale;
use Xtuple\Xdruple\Application\Service\Session\Drupal\DrupalMessageTestFunctions;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\ErrorNotificationWithTokens;
use Xtuple\Xdruple\Application\Service\Session\Notification\Type\Notification\StatusNotificationWithTokens;

class ListNotificationTest
  extends TestCase {
  /**
   * @throws \Throwable
   */
  public function testArrayList() {
    $list = new ArrayListNotification();
    self::assertEquals(0, $list->count());
    self::assertTrue($list->isEmpty());
    $list = $list->add(new StatusNotificationWithTokens('{order} notification', [
      'order' => 'First',
    ]));
    self::assertEquals(1, $list->count());
    self::assertFalse($list->isEmpty());
    self::assertTrue($list->get(0)->type()->isStatus());
    self::assertEquals('First notification', $list->get(0)->message()->__toString());
    $list = $list->add(new StatusNotificationWithTokens('{order} notification', [
      'order' => 'First',
    ]));
    self::assertEquals(1, $list->count());
    $list = $list->add(new ErrorNotificationWithTokens('{order} notification', [
      'order' => 'First',
    ]));
    self::assertEquals(2, $list->count());
    $list = $list->append(new StatusNotificationWithTokens('{order} notification', [
      'order' => 'First',
    ]));
    self::assertEquals(3, $list->count());
  }

  public function testDrupal() {
    $drupal = new DrupalMessageTestFunctions();
    $list = new DrupalListNotification(new TestLocale('en_US'), $drupal);
    self::assertEquals(0, $list->count());
    self::assertTrue($list->isEmpty());
    $drupal->drupalSetMessage('Test notification');
    $drupal->drupalSetMessage('Test error', 'error');
    $list = new DrupalListNotification(new TestLocale('en_US'), $drupal);
    self::assertEquals(2, $list->count());
    self::assertFalse($list->isEmpty());
    self::assertEquals('Test notification', $list->get(0)->message()->__toString());
    $notifications = [
      'Test notification',
      'Test error',
    ];
    foreach ($list as $i => $notification) {
      self::assertEquals($notifications[$i], $notification->message()->__toString());
    }
  }

  public function testMutable() {
    $list = new MutableListNotification();
    self::assertEquals(0, $list->count());
    self::assertTrue($list->isEmpty());
    $list->add(new StatusNotificationWithTokens('{order} notification', [
      'order' => 'First',
    ]));
    self::assertEquals(1, $list->count());
    self::assertFalse($list->isEmpty());
    self::assertTrue($list->get(0)->type()->isStatus());
    self::assertEquals('First notification', $list->get(0)->message()->__toString());
    $list->add(new StatusNotificationWithTokens('{order} notification', [
      'order' => 'First',
    ]));
    self::assertEquals(1, $list->count());
    $list->add(new ErrorNotificationWithTokens('{order} error', [
      'order' => 'First',
    ]));
    self::assertEquals(2, $list->count());
    $list->append(new StatusNotificationWithTokens('{order} notification', [
      'order' => 'First',
    ]));
    self::assertEquals(3, $list->count());
    $notifications = [
      'First notification',
      'First error',
      'First notification',
    ];
    foreach ($list as $i => $notification) {
      self::assertEquals($notifications[$i], $notification->message()->__toString());
    }
  }
}

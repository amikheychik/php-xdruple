<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL;

use PHPUnit\Framework\TestCase;
use Xtuple\Util\Type\String\Message\Type\String\StringMessage;
use Xtuple\Xdruple\Application\Service\Locale\TestLocale;
use Xtuple\Xdruple\Application\Service\URL\URI\URIStruct;

class URLTest
  extends TestCase {
  public function testURL() {
    $url = new TestURL(new TestLocale());
    self::assertEquals('/', $url->url(new URIStruct()));
    self::assertEquals('/', $url->url(new URIStruct('<front>')));
    self::assertEquals('/products', $url->url(new URIStruct('products')));
    self::assertEquals('http://example.com/products', $url->url(new URIStruct('products', [
      'absolute' => true,
    ])));
    self::assertEquals('/products#related', $url->url(new URIStruct('products', [
      'fragment' => 'related',
    ])));
    self::assertEquals('/products?title=Test', $url->url(new URIStruct('products', [
      'query' => [
        'title' => 'Test',
      ],
    ])));
    self::assertEquals('http://example.com/products?title=Test#related', $url->url(new URIStruct('products', [
      'absolute' => true,
      'fragment' => 'related',
      'query' => [
        'title' => 'Test',
      ],
    ])));
    self::assertEquals(
      '<a href="/products">Products</a>',
      $url->l(new StringMessage('Products'), new URIStruct('products'))
    );
    self::assertEquals('node/1', $url->entity('node', (object) ['id' => 1])->path());
    self::assertEquals('node', $url->entity('node', (object) ['id' => 1])->options()['entity_type']);
    self::assertFalse($url->isActive(new URIStruct('products')));
    self::assertTrue($url->isActive(new URIStruct('<front>')));
    self::assertTrue($url->isActive(new URIStruct()));
  }
}

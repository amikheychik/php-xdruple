<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL\URI;

use PHPUnit\Framework\TestCase;

class URITest
  extends TestCase {
  public function testStruct() {
    $uri = new URIStruct();
    self::assertEquals('', $uri->path());
    self::assertEquals([], $uri->options());
    $uri = new URIStruct('products', [
      'fragment' => 'suggested',
    ]);
    self::assertEquals('products', $uri->path());
    self::assertEquals([
      'fragment' => 'suggested',
    ], $uri->options());
  }

  public function testArray() {
    $uri = new URIArray([
      'path' => 'products',
    ]);
    self::assertEquals('products', $uri->path());
    self::assertEquals([], $uri->options());
    $uri = new URIArray([
      'path' => 'products',
      'options' => [
        'query' => [
          'catalog' => 1,
        ],
      ],
    ]);
    self::assertEquals('products', $uri->path());
    self::assertEquals([
      'query' => [
        'catalog' => 1,
      ],
    ], $uri->options());
  }
}

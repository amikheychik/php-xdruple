<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Locale\Locale;
use Xtuple\Xdruple\Application\Service\URL\URI\URI;
use Xtuple\Xdruple\Application\Service\URL\URI\URIStruct;

final class TestURL
  implements URL {
  /** @var Locale */
  private $locale;
  /** @var string */
  private $base;
  /** @var string */
  private $active;

  public function __construct(Locale $locale, string $base = 'http://example.com', string $active = '<front>') {
    $this->locale = $locale;
    $this->base = $base;
    $this->active = $active === '<front>' ? '' : $active;
  }

  public function url(URI $path): string {
    return implode('', array_filter([
      !empty($path->options()['absolute']) ? rtrim($this->base, '/') : '',
      ($path->path() === '<front>') ? '/' : "/{$path->path()}",
      !empty($path->options()['query']) ? strtr('?{query}', [
        '{query}' => http_build_query($path->options()['query']),
      ]) : '',
      !empty($path->options()['fragment']) ? "#{$path->options()['fragment']}" : '',
    ]));
  }

  public function l(Message $text, URI $path): string {
    return strtr('<a href="{href}">{text}</a>', [
      '{href}' => $this->url($path),
      '{text}' => $this->locale->translate($text),
    ]);
  }

  public function entity(string $type, $entity): URI {
    return new URIStruct("{$type}/{$entity->id}", [
      'entity_type' => $type,
      'entity' => $entity,
    ]);
  }

  public function isActive(URI $uri): bool {
    return (
      ($uri->path() === $this->active)
      || ($uri->path() === '<front>' && $this->active === '')
    );
  }
}

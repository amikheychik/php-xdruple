<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\URL;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Xdruple\Application\Service\Locale\Locale;
use Xtuple\Xdruple\Application\Service\URL\Entity\EntityURL;
use Xtuple\Xdruple\Application\Service\URL\URI\URI;

/**
 * @codeCoverageIgnore Drupal
 */
final class DrupalURL
  implements URL {
  /** @var Locale */
  private $locale;
  /** @var EntityURL */
  private $entities;

  public function __construct(Locale $locale, EntityURL $entities) {
    $this->locale = $locale;
    $this->entities = $entities;
  }

  public function url(URI $path): string {
    return url($path->path(), $path->options());
  }

  public function l(Message $text, URI $path): string {
    return l($this->locale->translate($text), $path->path(), $path->options());
  }

  public function entity(string $type, $entity): URI {
    return $this->entities->uri($type, $entity);
  }

  public function isActive(URI $uri): bool {
    return (
      (
        $uri->path() === (string) $_GET['q']
        || ($uri->path() === '<front>' && drupal_is_front_page())
      )
      && (
        empty($uri->options()['language'])
        || $uri->options()['language']->language === $GLOBALS['language_url']->language
      )
    );
  }
}

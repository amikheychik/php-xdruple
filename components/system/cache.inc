<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\System\Cache\CacheComponent;

/**
 * Implements hook_flush_caches().
 *
 * @return array
 */
function xdruple_flush_caches() {
  return _xdruple_application_cache_component()->flushCaches();
}

function _xdruple_application_cache_component(): CacheComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(CacheComponent::NAME);
  /** @var CacheComponent $component */
  return $component;
}

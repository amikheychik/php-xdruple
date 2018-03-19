<?php declare(strict_types=1);

/**
 * @file keeps View module plugins hooks implementations
 * @see  https://api.drupal.org/api/views/views.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\Views\Plugins\ViewsPluginsComponent;

include_once 'views_api.inc';

/**
 * Implements hook_views_plugins().
 *
 */
function xdruple_views_plugins() {
  return _xdruple_application_views_plugins_component()->viewsPlugins();
}

/**
 * Implements hook_views_plugins_alter().
 *
 * @param array $plugins
 */
function xdruple_views_plugins_alter(&$plugins) {
  _xdruple_application_views_plugins_component()->viewsPluginsAlter($plugins);
}

function _xdruple_application_views_plugins_component(): ViewsPluginsComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(ViewsPluginsComponent::NAME);
  /** @var ViewsPluginsComponent $component */
  return $component;
}

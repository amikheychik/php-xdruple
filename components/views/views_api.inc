<?php declare(strict_types=1);

/**
 * @file keeps hook_views_api() implementation as it's required by any of Views components to be implemented.
 */

/**
 * Implements hook_views_api().
 *
 * @return array
 *
 * @see ctools_plugin_api_include()
 */
function xdruple_views_api() {
  return [
    'api' => 3,
  ];
}

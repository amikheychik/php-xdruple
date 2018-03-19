<?php declare(strict_types=1);

/**
 * @file keeps search.api.php hooks implementation
 */

use Xtuple\Xdruple\Application\Component\Component\Module\Search\SearchComponent;

/**
 * Implements hook_search_info().
 *
 * @return array
 */
function xdruple_search_info() {
  return _xdruple_application_search_component()->searchInfo();
}

/**
 * Implements hook_search_access().
 *
 * @return bool
 */
function xdruple_search_access() {
  return _xdruple_application_search_component()->searchAccess();
}

/**
 * Implements hook_search_admin().
 *
 * @return array
 */
function xdruple_search_admin() {
  return _xdruple_application_search_component()->searchAdmin();
}

/**
 * Implements callback_search_conditions()
 *
 * @param $keys
 *
 * @return array
 */
function xdruple_search_conditions($keys) {
  return _xdruple_application_search_component()->searchConditions($keys);
}

/**
 * Implements hook_search_execute().
 *
 * @param string|null $keys
 * @param array|null  $conditions
 *
 * @return array
 */
function xdruple_search_execute($keys = null, $conditions = null) {
  return _xdruple_application_search_component()->searchExecute($keys, $conditions);
}

/**
 * Implements hook_search_page().
 *
 * @param array $results
 *
 * @return array
 */
function xdruple_search_page($results) {
  return _xdruple_application_search_component()->searchPage($results);
}

/**
 * Implements hook_search_preprocess().
 *
 * @param string $text
 *
 * @return string
 */
function xdruple_search_preprocess($text) {
  return _xdruple_application_search_component()->searchPreprocess($text);
}

/**
 * Implements hook_search_reset().
 */
function xdruple_search_reset() {
  _xdruple_application_search_component()->searchReset();
}

/**
 * Implements hook_search_status().
 *
 * @return array
 */
function xdruple_search_status() {
  return _xdruple_application_search_component()->searchStatus();
}

/**
 * Implements hook_update_index().
 */
function xdruple_update_index() {
  _xdruple_application_search_component()->updateIndex();
}

function _xdruple_application_search_component(): SearchComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(SearchComponent::NAME);
  /** @var SearchComponent $component */
  return $component;
}

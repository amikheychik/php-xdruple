<?php declare(strict_types=1);

/**
 * @file keeps Filter module hooks implementations
 * @see  https://api.drupal.org/api/drupal/modules!filter!filter.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\Module\Filter\FilterComponent;

/**
 * Implements hook_filter_info().
 *
 * @return array
 */
function xdruple_filter_info() {
  return _xdruple_application_filter_component()->filterInfo();
}

/**
 * Implements hook_filter_info_alter().
 *
 * @param array $info
 */
function xdruple_filter_info_alter(&$info) {
  _xdruple_application_filter_component()->filterInfoAlter($info);
}

/**
 * Implements hook_filter_format_insert().
 *
 * @param \stdClass $format
 */
function xdruple_filter_format_insert($format) {
  _xdruple_application_filter_component()->filterFormatInsert($format);
}

/**
 * Implements hook_filter_format_update().
 *
 * @param \stdClass $format
 */
function xdruple_filter_format_update($format) {
  _xdruple_application_filter_component()->filterFormatUpdate($format);
}

/**
 * Implements hook_filter_format_disable().
 *
 * @param \stdClass $format
 */
function xdruple_filter_format_disable($format) {
  _xdruple_application_filter_component()->filterFormatDisable($format);
}

/**
 * @see callback_filter_settings()
 *
 * @param array       $form
 * @param array       $form_state
 * @param \stdClass   $filter
 * @param \stdClass   $format
 * @param array       $defaults
 * @param \stdClass[] $filters
 *
 * @return array
 */
function xdruple_filter_settings($form, &$form_state, $filter, $format, $defaults, $filters) {
  return _xdruple_application_filter_component()->filterSettings($form, $form_state, $filter, $format, $defaults, $filters);
}

/**
 * @see callback_filter_prepare()
 *
 * @param string    $text
 * @param \stdClass $filter
 * @param \stdClass $format
 * @param string    $langcode
 * @param bool      $cache
 * @param string    $cache_id
 *
 * @return string
 */
function xdruple_filter_prepare($text, $filter, $format, $langcode, $cache, $cache_id) {
  return _xdruple_application_filter_component()->filterPrepare($text, $filter, $format, $langcode, $cache, $cache_id);
}

/**
 * @see callback_filter_process()
 *
 * @param string    $text
 * @param \stdClass $filter
 * @param \stdClass $format
 * @param string    $langcode
 * @param bool      $cache
 * @param string    $cache_id
 *
 * @return string
 */
function xdruple_filter_process($text, $filter, $format, $langcode, $cache, $cache_id) {
  return _xdruple_application_filter_component()->filterProcess($text, $filter, $format, $langcode, $cache, $cache_id);
}

/**
 * @see callback_filter_tips()
 *
 * @param \stdClass $filter
 * @param \stdClass $format
 * @param bool      $long
 *
 * @return string
 */
function xdruple_filter_tips($filter, $format, $long) {
  return _xdruple_application_filter_component()->filterTips($filter, $format, $long);
}

function _xdruple_application_filter_component(): FilterComponent {
  /** @var FilterComponent $component */
  $component = xdruple_application()->component(FilterComponent::NAME);
  return $component;
}

<?php declare(strict_types=1);

/**
 * @file keeps View module hooks implementations
 * @see  https://api.drupal.org/api/views/views.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\Views\View\ViewsViewComponent;

include_once 'views_api.inc';

/**
 * Implements hook_views_default_views().
 *
 * @return view[]
 */
function xdruple_views_default_views() {
  return _xdruple_application_views_component()->viewsDefaultViews();
}

/**
 * Implements hook_views_default_views_alter().
 *
 * @param view[] $views
 */
function xdruple_views_default_views_alter(&$views) {
  _xdruple_application_views_component()->viewsDefaultViewsAlter($views);
}

/**
 * Implements hook_views_invalidate_cache().
 */
function xdruple_views_invalidate_cache() {
  _xdruple_application_views_component()->viewsInvalidateCache();
}

/**
 * Implements hook_views_pre_view().
 *
 * @param view   $view
 * @param string $display_id
 * @param array  $args
 */
function xdruple_views_pre_view(&$view, &$display_id, &$args) {
  _xdruple_application_views_component()->viewsPreView($view, $display_id, $args);
}

/**
 * Implements hook_views_pre_build().
 *
 * @param view $view
 */
function xdruple_views_pre_build(&$view) {
  _xdruple_application_views_component()->viewsPreBuild($view);
}

/**
 * Implements hook_views_query_alter().
 *
 * @param view               $view
 * @param views_plugin_query $query
 */
function xdruple_views_query_alter(&$view, &$query) {
  _xdruple_application_views_component()->viewsQueryAlter($view, $query);
}

/**
 * Implements hook_views_query_substitutions().
 *
 * @param view|views_plugin_query_default $view
 *
 * @return string[]
 */
function xdruple_views_query_substitutions($view) {
  return _xdruple_application_views_component()->viewsQuerySubstitutions($view);
}

/**
 * Implements hook_views_post_build().
 *
 * @param view $view
 */
function xdruple_views_post_build(&$view) {
  _xdruple_application_views_component()->viewsPostBuild($view);
}

/**
 * Implements hook_views_pre_execute().
 *
 * @param view $view
 */
function xdruple_views_pre_execute(&$view) {
  _xdruple_application_views_component()->viewsPreExecute($view);
}

/**
 * Implements hook_views_post_execute().
 *
 * @param view $view
 */
function xdruple_views_post_execute(&$view) {
  _xdruple_application_views_component()->viewsPostExecute($view);
}

/**
 * Implements hook_views_pre_render().
 *
 * @param view $view
 */
function xdruple_views_pre_render(&$view) {
  _xdruple_application_views_component()->viewsPreRender($view);
}

/**
 * Implements hook_views_form_substitutions().
 *
 * @return string[]
 */
function xdruple_views_form_substitutions() {
  return _xdruple_application_views_component()->viewsFormSubstitutions();
}

/**
 * Implements hook_views_post_render().
 *
 * @param view                $view
 * @param string              $output
 * @param \views_plugin_cache $cache
 */
function xdruple_views_post_render(&$view, &$output, &$cache) {
  _xdruple_application_views_component()->viewsPostRender($view, $output, $cache);
}

/**
 * Implements hook_views_ajax_data_alter().
 *
 * @param array $commands
 * @param view  $view
 */
function xdruple_views_ajax_data_alter(&$commands, $view) {
  _xdruple_application_views_component()->viewsAjaxDataAlter($commands, $view);
}

/**
 * @deprecated hook is documented on drupal.org, but no reference to it in the code
 * Implements hook_views_view_presave().
 *
 * @param view $view
 */
function xdruple_views_view_presave($view) {
}

/**
 * @deprecated hook is documented on drupal.org, but no reference to it in the code
 * Implements hook_views_view_save().
 *
 * @param view $view
 */
function xdruple_views_view_save($view) {
}

/**
 * @deprecated hook is documented on drupal.org, but no reference to it in the code
 * Implements hook_views_view_delete().
 *
 * @param view $view
 */
function xdruple_views_view_delete($view) {
}

function _xdruple_application_views_component(): ViewsViewComponent {
  /** @var ViewsViewComponent $component */
  $component = xdruple_application()->component(ViewsViewComponent::NAME);
  return $component;
}

<?php declare(strict_types=1);

/**
 * @file keeps Views UI module hooks implementations
 */

use Xtuple\Xdruple\Application\Component\Component\Views\UI\ViewsUIComponent;

include_once 'views_api.inc';

/**
 * Implements hook_views_preview_info_alter().
 *
 * @param array $rows
 * @param view  $view
 */
function xdruple_views_preview_info_alter(&$rows, $view) {
  _xdruple_application_views_ui_component()->viewsPreviewInfoAlter($rows, $view);
}

/**
 * Implements hook_views_ui_display_tab_alter().
 *
 * @param array  $build
 * @param view   $view
 * @param string $display_id
 *
 * @see views_ui_get_display_tab()
 */
function xdruple_views_ui_display_tab_alter(&$build, $view, $display_id) {
  _xdruple_application_views_ui_component()->viewsUiDisplayTabAlter($build, $view, $display_id);
}

/**
 * Implements hook_views_ui_display_top_links_alter().
 *
 * @param array  $links
 * @param view   $view
 * @param string $display_id
 *
 * @see views_ui_render_display_top()
 */
function xdruple_views_ui_display_top_links_alter(&$links, $view, $display_id) {
  _xdruple_application_views_ui_component()->viewsUiDisplayTopLinksAlter($links, $view, $display_id);
}

function _xdruple_application_views_ui_component(): ViewsUIComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(ViewsUIComponent::NAME);
  /** @var ViewsUIComponent $component */
  return $component;
}

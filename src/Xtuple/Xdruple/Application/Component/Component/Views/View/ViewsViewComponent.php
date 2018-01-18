<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Views\View;

use view;
use views_plugin_query;
use views_plugin_query_default;
use Xtuple\Xdruple\Application\Component\Component;

interface ViewsViewComponent
  extends Component {
  public const NAME = 'views_view';

  /**
   * @see hook_views_default_views().
   *
   * @return view[]
   */
  public function viewsDefaultViews();

  /**
   * @see hook_views_default_views_alter().
   *
   * @param view[] $views
   */
  public function viewsDefaultViewsAlter(&$views);

  /**
   * @see hook_views_invalidate_cache().
   */
  public function viewsInvalidateCache();

  /**
   * @see hook_views_pre_view().
   *
   * @param view   $view
   * @param string $displayId
   * @param array  $args
   */
  public function viewsPreView(&$view, &$displayId, &$args);

  /**
   * @see hook_views_pre_build().
   *
   * @param view $view
   */
  public function viewsPreBuild(&$view);

  /**
   * @see hook_views_query_alter().
   *
   * @param view               $view
   * @param views_plugin_query $query
   */
  public function viewsQueryAlter(&$view, &$query);

  /**
   * @see hook_views_query_substitutions().
   *
   * @param view|views_plugin_query_default $view
   *
   * @return string[]
   */
  public function viewsQuerySubstitutions($view);

  /**
   * @see hook_views_post_build().
   *
   * @param view $view
   */
  public function viewsPostBuild(&$view);

  /**
   * @see hook_views_pre_execute().
   *
   * @param view $view
   */
  public function viewsPreExecute(&$view);

  /**
   * @see hook_views_post_execute().
   *
   * @param view $view
   */
  public function viewsPostExecute(&$view);

  /**
   * @see hook_views_pre_render().
   *
   * @param view $view
   */
  public function viewsPreRender(&$view);

  /**
   * @see hook_views_form_substitutions().
   *
   * @return string[]
   */
  public function viewsFormSubstitutions();

  /**
   * @see hook_views_post_render().
   *
   * @param view                $view
   * @param string              $output
   * @param \views_plugin_cache $cache
   */
  public function viewsPostRender(&$view, &$output, &$cache);

  /**
   * @see hook_views_ajax_data_alter().
   *
   * @param array $commands
   * @param view  $view
   */
  public function viewsAjaxDataAlter(&$commands, $view);
}

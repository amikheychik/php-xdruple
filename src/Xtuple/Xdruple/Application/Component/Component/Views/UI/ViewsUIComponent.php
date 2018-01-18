<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Views\UI;

use Xtuple\Xdruple\Application\Component\Component;

interface ViewsUIComponent
  extends Component {
  public const NAME = 'views_ui';

  /**
   * @see hook_views_preview_info_alter().
   *
   * @param array $rows
   * @param \view $view
   */
  public function viewsPreviewInfoAlter(&$rows, $view);

  /**
   * @see hook_views_ui_display_tab_alter().
   *
   * @param array  $build
   * @param \view  $view
   * @param string $displayId
   */
  public function viewsUiDisplayTabAlter(&$build, $view, $displayId);

  /**
   * @see hook_views_ui_display_top_links_alter().
   *
   * @param array  $links
   * @param \view  $view
   * @param string $displayId
   */
  public function viewsUiDisplayTopLinksAlter(&$links, $view, $displayId);
}

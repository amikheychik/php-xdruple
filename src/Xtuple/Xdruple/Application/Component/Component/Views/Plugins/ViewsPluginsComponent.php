<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Views\Plugins;

use Xtuple\Xdruple\Application\Component\Component;

interface ViewsPluginsComponent
  extends Component {
  public const NAME = 'views_plugins';

  /**
   * @see hook_views_plugins().
   *
   * @return array
   */
  public function viewsPlugins();

  /**
   * @see hook_views_plugins_alter().
   *
   * @param array $plugins
   */
  public function viewsPluginsAlter(&$plugins);
}

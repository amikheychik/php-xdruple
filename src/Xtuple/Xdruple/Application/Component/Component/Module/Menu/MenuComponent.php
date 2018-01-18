<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\Menu;

use Xtuple\Xdruple\Application\Component\Component;

interface MenuComponent
  extends Component {
  public const NAME = 'menu';

  /**
   * @see hook_menu_insert().
   *
   * @param array $menu
   */
  public function menuInsert($menu);

  /**
   * @see hook_menu_update().
   *
   * @param array $menu
   */
  public function menuUpdate($menu);

  /**
   * @see hook_menu_delete().
   *
   * @param array $menu
   */
  public function menuDelete($menu);
}

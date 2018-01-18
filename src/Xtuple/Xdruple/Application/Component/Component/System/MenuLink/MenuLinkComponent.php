<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\MenuLink;

use Xtuple\Xdruple\Application\Component\Component;

interface MenuLinkComponent
  extends Component {
  public const NAME = 'menu_link';

  /**
   * @see hook_menu_link_insert().
   *
   * @param array $link
   */
  public function menuLinkInsert($link);

  /**
   * @see hook_menu_link_update().
   *
   * @param array $link
   */
  public function menuLinkUpdate($link);

  /**
   * @see hook_menu_link_delete().
   *
   * @param array $link
   */
  public function menuLinkDelete($link);

  /**
   * @see hook_menu_link_alter().
   *
   * @param array $item
   */
  public function menuLinkAlter(&$item);
}

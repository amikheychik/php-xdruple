<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Router;

use Xtuple\Xdruple\Application\Component\Component;

interface RouterComponent
  extends Component {
  public const NAME = 'router';

  /**
   * @see hook_menu()
   *
   * @return array
   */
  public function menu();

  /**
   * @see hook_menu_alter()
   *
   * @param array $items
   */
  public function menuAlter(&$items);

  /**
   * @see hook_menu() - 'load callback'
   *
   * @param string $id
   * @param string $path
   * @param array  $map
   * @param int    $index
   * @param array  $loaders
   * @param array  $args
   *
   * @return mixed|false
   */
  public function menuLoad($id, $path, $map, $index, $loaders, $args);

  /**
   * @see hook_menu() - 'access callback'
   *
   * @param string $path
   * @param array  $args
   *
   * @return bool
   */
  public function menuAccess(string $path, array $args): bool;

  /**
   * @see hook_menu() - 'title callback'
   *
   * @param string $path
   * @param array  $args
   *
   * @return string
   */
  public function menuTitle(string $path, array $args): string;

  /**
   * @see hook_menu() - 'page callback'
   *
   * @param string $path
   * @param array  $args
   *
   * @return array|int
   */
  public function menuPage(string $path, array $args);

  /**
   * @see hook_menu() - 'theme callback'
   *
   * @param string $path
   * @param array  $args
   *
   * @return string
   */
  public function menuTheme(string $path, array $args): string;

  /**
   * @see hook_menu() - 'delivery callback'
   *
   * @param array|string $data
   */
  public function menuDelivery($data);

  /**
   * @see hook_menu_breadcrumb_alter()
   *
   * @param array $active_trail
   * @param array $item
   */
  public function menuBreadcrumbAlter(&$active_trail, $item);

  /**
   * @see hook_menu_contextual_links_alter()
   *
   * @param array  $links
   * @param array  $routerItem
   * @param string $rootPath
   */
  public function menuContextualLinksAlter(&$links, $routerItem, $rootPath);

  /**
   * @see hook_menu_local_tasks_alter()
   *
   * @param array  $data
   * @param array  $routerItem
   * @param string $rootPath
   */
  public function menuLocalTasksAlter(&$data, $routerItem, $rootPath);

  /**
   * @see hook_menu_site_status_alter()
   *
   * @param int    $menuSiteStatus
   * @param string $path
   */
  public function menuSiteStatusAlter(&$menuSiteStatus, $path);

  /**
   * @see hook_menu_get_item_alter()
   *
   * @param array  $routerItem
   * @param string $path
   * @param array  $originalMap
   */
  public function menuGetItemAlter(&$routerItem, $path, $originalMap);

  /**
   * @see hook_drupal_goto_alter()
   *
   * @param string $path
   * @param array  $options
   * @param int    $httpResponseCode
   */
  public function drupalGotoAlter(&$path, &$options, &$httpResponseCode);
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\AdminPaths;

interface AdminPathsComponent {
  public const NAME = 'admin_paths';

  /**
   * @see hook_admin_paths().
   *
   * @return array
   */
  public function adminPaths();

  /**
   * @see hook_admin_paths_alter().
   *
   * @param array $paths
   */
  public function adminPathsAlter(&$paths);
}

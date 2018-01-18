<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Module;

use Xtuple\Xdruple\Application\Component\Component;

interface ModuleComponent
  extends Component {
  public const NAME = 'module';

  /**
   * @see hook_module_implements_alter().
   *
   * @param string[] $implementations
   * @param string   $hook
   */
  public function moduleImplementsAlter(&$implementations, $hook);

  /**
   * @see hook_modules_installed().
   *
   * @param string[] $modules
   */
  public function modulesInstalled($modules);

  /**
   * @see hook_modules_enabled().
   *
   * @param string[] $modules
   */
  public function modulesEnabled($modules);

  /**
   * @see hook_modules_disabled().
   *
   * @param string[] $modules
   */
  public function modulesDisabled($modules);

  /**
   * @see hook_modules_uninstalled().
   *
   * @param string[] $modules
   */
  public function modulesUninstalled($modules);
}

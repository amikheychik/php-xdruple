<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\System;

use Xtuple\Xdruple\Application\Component\Component;

interface SystemComponent
  extends Component {
  public const NAME = 'system';

  /**
   * @see hook_system_info_alter().
   *
   * @param array     $info
   * @param \stdClass $file
   * @param string    $type
   */
  public function systemInfoAlter(&$info, $file, $type);

  /**
   * @see hook_system_theme_info().
   *
   * @return string[]
   */
  public function systemThemeInfo();

  /**
   * @see hook_registry_files_alter().
   *
   * @param array       $files
   * @param \stdClass[] $modules
   */
  public function registryFilesAlter(&$files, $modules);
}

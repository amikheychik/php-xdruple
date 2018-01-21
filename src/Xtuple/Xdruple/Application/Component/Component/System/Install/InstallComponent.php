<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Install;

use Xtuple\Xdruple\Application\Component\Component;

interface InstallComponent
  extends Component {
  public const NAME = 'install';

  /**
   * @see hook_update_N()
   */
  public function boot(): void;

  /**
   * @see hook_schema()
   *
   * @return array
   */
  public function schema();

  /**
   * @see hook_schema_alter()
   *
   * @param array $schema
   */
  public function schemaAlter(&$schema);

  /**
   * @see hook_install()
   */
  public function install();

  /**
   * @see hook_schema()
   */
  public function enable();

  /**
   * @see hook_update_last_removed()
   *
   * @return int
   */
  public function updateLastRemoved(): int;

  /**
   * @see hook_update_dependencies()
   *
   * @return array
   */
  public function updateDependencies(): array;

  /**
   * @see hook_update_N()
   *
   * @throws \DrupalUpdateException
   *
   * @param int $version
   *
   * @return string
   */
  public function updateN(int $version): string;

  /**
   * @see hook_disable()
   */
  public function disable();

  /**
   * @see hook_uninstall()
   */
  public function uninstall();
}

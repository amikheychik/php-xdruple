<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Install;

use Xtuple\Xdruple\Application\Component\Component;

interface InstallComponent
  extends Component {
  public const NAME = 'install';

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
   * @see hook_disable()
   */
  public function disable();

  /**
   * @see hook_uninstall()
   */
  public function uninstall();
}

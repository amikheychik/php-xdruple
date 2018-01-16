<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Variable\Drupal;

use Xtuple\Xdruple\Application\Configuration\Variable\Variable;

final class DatabasesConfiguration
  implements Variable {
  /** @var array */
  private $value;

  public function __construct() {
    if (empty($GLOBALS['databases']) && empty($GLOBALS['install']['databases'])) {
      throw new \Exception('Databases configuration is not set');
    }
    $this->value = !empty($GLOBALS['databases']) ? $GLOBALS['databases'] : $GLOBALS['install']['databases'];
  }

  /**
   * @return array
   */
  public function value() {
    return $this->value;
  }
}

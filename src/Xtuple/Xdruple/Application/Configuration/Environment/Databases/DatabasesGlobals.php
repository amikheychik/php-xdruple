<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Configuration\Environment\Databases;

use Xtuple\Util\Exception\Exception;

final class DatabasesGlobals
  extends AbstractDatabases {
  /**
   * @throws \Throwable - if databases global variables are not set.
   */
  public function __construct() {
    if (empty($GLOBALS['databases']) && empty($GLOBALS['install']['databases'])) {
      throw new Exception('Databases configuration is not set');
    }
    parent::__construct(new DatabasesArray($GLOBALS['databases'] ?? $GLOBALS['install']['databases']));
  }
}

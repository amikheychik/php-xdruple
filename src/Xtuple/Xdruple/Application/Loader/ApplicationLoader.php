<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Loader;

use Xtuple\Xdruple\Application\Application;

interface ApplicationLoader {
  public function application(): Application;
}

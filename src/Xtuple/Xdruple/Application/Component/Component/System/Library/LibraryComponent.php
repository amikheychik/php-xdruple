<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library;

use Xtuple\Xdruple\Application\Component\Component;

interface LibraryComponent
  extends Component {
  public const NAME = 'library';

  public function library(): array;

  public function libraryAlter(array &$libraries, string $module): void;
}

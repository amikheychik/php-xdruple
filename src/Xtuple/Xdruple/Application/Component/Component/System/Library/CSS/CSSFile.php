<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS;

use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroup;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroupDefault;
use Xtuple\Xdruple\Application\Service\Finder\Path\Path;

final class CSSFile
  implements CSS {
  /** @var Path */
  private $path;
  /** @var null|CSSGroup */
  private $group;
  /** @var array */
  private $options;

  public function __construct(Path $path, ?CSSGroup $group = null, array $options = []) {
    $this->path = $path;
    $this->group = $group ?: new CSSGroupDefault();
    $this->options = $options;
  }

  public function data() {
    return $this->path->relative();
  }

  public function options(): ?array {
    return [
        'type' => 'file',
        'group' => $this->group->weight(),
      ] + $this->options;
  }
}

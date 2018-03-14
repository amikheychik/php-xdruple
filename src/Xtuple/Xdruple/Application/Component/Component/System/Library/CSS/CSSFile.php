<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS;

use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroup;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroupDefault;
use Xtuple\Xdruple\Application\Service\Finder\Package\Package;

final class CSSFile
  implements CSS {
  /** @var Package */
  private $package;
  /** @var string */
  private $filename;
  /** @var null|CSSGroup */
  private $group;
  /** @var array */
  private $options;

  public function __construct(Package $package, string $filename, ?CSSGroup $group = null, array $options = []) {
    $this->package = $package;
    $this->filename = $filename;
    $this->group = $group ?: new CSSGroupDefault();
    $this->options = $options;
  }

  public function data() {
    return "{$this->package->path()}/{$this->filename}";
  }

  public function options(): ?array {
    return [
        'type' => 'file',
        'group' => $this->group->weight(),
      ] + $this->options;
  }
}

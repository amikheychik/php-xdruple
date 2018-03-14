<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS;

use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroup;
use Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group\CSSGroupDefault;
use Xtuple\Xdruple\Application\Service\Finder\Package\Package;

final class CSSFile
  extends AbstractCSS {
  public function __construct(Package $package, string $filename, ?CSSGroup $group = null, array $options = []) {
    $group = $group ?: new CSSGroupDefault();
    parent::__construct(new CSSStruct("{$package->path()}/{$filename}", [
        'type' => 'file',
        'group' => $group->weight(),
      ] + $options));
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Library\CSS\Group;

/**
 * @see CSS_SYSTEM
 */
final class CSSGroupSystem
  extends AbstractCSSGroup {
  public function __construct() {
    parent::__construct(new CSSGroupStruct(-100));
  }
}

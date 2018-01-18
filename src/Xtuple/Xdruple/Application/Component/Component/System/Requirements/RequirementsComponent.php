<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Requirements;

use Xtuple\Xdruple\Application\Component\Component;

interface RequirementsComponent
  extends Component {
  public const NAME = 'requirements';

  /**
   * @see hook_requirements()
   *
   * @param string $phase
   *
   * @return array
   *
   * @see \Xtuple\Xdruple\Application\Component\Component\System\Requirements\Enum\Phase
   */
  public function requirements($phase);
}

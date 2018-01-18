<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Entity;

use Xtuple\Xdruple\Application\Component\Component;

interface EntityComponent
  extends Component {
  public const NAME = 'entity';

  /**
   * @see hook_entity_info().
   *
   * @return array
   */
  public function entityInfo();

  /**
   * @see hook_entity_info_alter().
   *
   * @param $entityInfo
   */
  public function entityInfoAlter(&$entityInfo);
}

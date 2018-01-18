<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\Info;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Field Info API (https://api.drupal.org/api/drupal/modules!field!field.info.inc/group/field_info/7)
 */
interface FieldInfoComponent
  extends Component {
  public const NAME = 'field_info';

  /**
   * @see hook_field_info_max_weight().
   *
   * @param $entityType
   * @param $bundle
   * @param $context
   *
   * @return int
   */
  public function fieldInfoMaxWeight($entityType, $bundle, $context);
}

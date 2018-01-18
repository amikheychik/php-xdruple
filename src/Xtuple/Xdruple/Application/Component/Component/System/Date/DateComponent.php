<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Date;

use Xtuple\Xdruple\Application\Component\Component;

interface DateComponent
  extends Component {
  public const NAME = 'date';

  /**
   * @see hook_date_formats().
   *
   * @return array
   */
  public function dateFormats();

  /**
   * @see hook_date_formats_alter().
   *
   * @param array $formats
   */
  public function dateFormatsAlter(&$formats);

  /**
   * @see hook_date_format_types().
   *
   * @return array
   */
  public function dateFormatTypes();

  /**
   * @see hook_date_format_types_alter().
   *
   * @param array $types
   */
  public function dateFormatTypesAlter(&$types);
}

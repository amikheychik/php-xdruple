<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Views\Data;

use Xtuple\Xdruple\Application\Component\Component;

interface ViewsDataComponent
  extends Component {
  public const NAME = 'views_data';

  /**
   * @see hook_views_data().
   *
   * @return array
   */
  public function viewsData();

  /**
   * @see hook_views_data_alter().
   *
   * @param array $data
   */
  public function viewsDataAlter(&$data);
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\Views;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see https://api.drupal.org/api/views/views.api.php/7
 */
interface FieldViewsComponent
  extends Component {
  public const NAME = 'field_views';

  /**
   * @see hook_field_views_data().
   *
   * @param array $field
   *
   * @return array
   */
  public function fieldViewsData($field);

  /**
   * @see hook_field_views_data_views_data_alter().
   *
   * @param array $data
   * @param array $field
   */
  public function fieldViewsDataViewsDataAlter(&$data, $field);

  /**
   * @see hook_field_views_data_alter().
   *
   * @param array  $result
   * @param array  $field
   * @param string $module
   */
  public function fieldViewsDataAlter(&$result, $field, $module);
}

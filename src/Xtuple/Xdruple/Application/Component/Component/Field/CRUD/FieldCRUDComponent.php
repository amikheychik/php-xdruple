<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\CRUD;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Field CRUD Interface (https://api.drupal.org/api/drupal/modules!field!field.crud.inc/group/field_crud/7)
 */
interface FieldCRUDComponent
  extends Component {
  public const NAME = 'field_crud';

  /**
   * @see hook_field_create_field()
   *
   * @param $field
   */
  public function fieldCreateField($field);

  /**
   * @see hook_field_create_instance()
   *
   * @param $instance
   */
  public function fieldCreateInstance($instance);

  /**
   * @see hook_field_read_field()
   *
   * @param $field
   */
  public function fieldReadField($field);

  /**
   * @see hook_field_read_instance()
   *
   * @param $instance
   */
  public function fieldReadInstance($instance);

  /**
   * @see hook_field_update_forbid()
   *
   * @param $field
   * @param $priorField
   * @param $hasData
   *
   * @throws \FieldUpdateForbiddenException
   */
  public function fieldUpdateForbid($field, $priorField, $hasData);

  /**
   * @see hook_field_update_field()
   *
   * @param $field
   * @param $priorField
   * @param $hasData
   */
  public function fieldUpdateField($field, $priorField, $hasData);

  /**
   * @see hook_field_update_instance()
   *
   * @param $instance
   * @param $priorInstance
   */
  public function fieldUpdateInstance($instance, $priorInstance);

  /**
   * @see hook_field_purge_field()
   *
   * @param $field
   */
  public function fieldPurgeField($field);

  /**
   * @see hook_field_purge_instance()
   *
   * @param $instance
   */
  public function fieldPurgeInstance($instance);

  /**
   * @see hook_field_delete_field()
   *
   * @param $field
   */
  public function fieldDeleteField($field);

  /**
   * @see hook_field_delete_instance()
   *
   * @param $instance
   */
  public function fieldDeleteInstance($instance);
}

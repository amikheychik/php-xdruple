<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\Storage;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Field Storage API (https://api.drupal.org/api/drupal/modules!field!field.attach.inc/group/field_storage/7)
 */
interface FieldStorageComponent
  extends Component {
  public const NAME = 'field_storage';

  /**
   * @see hook_field_storage_info()
   *
   * @return array
   */
  public function fieldStorageInfo();

  /**
   * @see hook_field_storage_info_alter()
   *
   * @param $info
   */
  public function fieldStorageInfoAlter(&$info);

  /**
   * @see hook_field_storage_details()
   *
   * @param $field
   *
   * @return array
   */
  public function fieldStorageDetails($field);

  /**
   * @see hook_field_storage_details_alter()
   *
   * @param $details
   * @param $field
   */
  public function fieldStorageDetailsAlter(&$details, $field);

  /**
   * @see hook_field_storage_create_field()
   *
   * @param $field
   */
  public function fieldStorageCreateField($field);

  /**
   * @see hook_field_storage_update_field()
   *
   * @param $field
   * @param $priorField
   * @param $hasData
   */
  public function fieldStorageUpdateField($field, $priorField, $hasData);

  /**
   * @see hook_field_storage_delete_field()
   *
   * @param $field
   */
  public function fieldStorageDeleteField($field);

  /**
   * @see hook_field_storage_delete_instance()
   *
   * @param $instance
   */
  public function fieldStorageDeleteInstance($instance);

  /**
   * @see hook_field_storage_pre_insert()
   *
   * @param $entityType
   * @param $entity
   * @param $skipFields
   */
  public function fieldStoragePreInsert($entityType, $entity, &$skipFields);

  /**
   * @see hook_field_storage_pre_update()
   *
   * @param $entityType
   * @param $entity
   * @param $skipFields
   */
  public function fieldStoragePreUpdate($entityType, $entity, &$skipFields);

  /**
   * @see hook_field_storage_write()
   *
   * @param $entityType
   * @param $entity
   * @param $op
   * @param $fields
   */
  public function fieldStorageWrite($entityType, $entity, $op, $fields);

  /**
   * @see hook_field_storage_pre_load()
   *
   * @param $entityType
   * @param $entities
   * @param $age
   * @param $skipFields
   * @param $options
   */
  public function fieldStoragePreLoad($entityType, $entities, $age, &$skipFields, $options);

  /**
   * @see hook_field_storage_load()
   *
   * @param $entityType
   * @param $entities
   * @param $age
   * @param $fields
   * @param $options
   */
  public function fieldStorageLoad($entityType, $entities, $age, $fields, $options);

  /**
   * @see hook_field_storage_purge()
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   */
  public function fieldStoragePurge($entityType, $entity, $field, $instance);

  /**
   * @see hook_field_storage_purge_field()
   *
   * @param $field
   */
  public function fieldStoragePurgeField($field);

  /**
   * @see hook_field_storage_purge_field_instance()
   *
   * @param $instance
   */
  public function fieldStoragePurgeFieldInstance($instance);

  /**
   * @see hook_field_storage_delete()
   *
   * @param $entityType
   * @param $entity
   * @param $fields
   */
  public function fieldStorageDelete($entityType, $entity, $fields);

  /**
   * @see hook_field_storage_delete_revision()
   *
   * @param $entityType
   * @param $entity
   * @param $fields
   */
  public function fieldStorageDeleteRevision($entityType, $entity, $fields);

  /**
   * @see hook_field_storage_query()
   *
   * @param $query
   *
   * @return int|array
   */
  public function fieldStorageQuery($query);
}

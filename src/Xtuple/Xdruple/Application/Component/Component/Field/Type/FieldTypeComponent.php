<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\Type;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Field Types API (https://api.drupal.org/api/drupal/modules!field!field.api.php/group/field_types/7)
 */
interface FieldTypeComponent
  extends Component {
  public const NAME = 'field_type';

  /**
   * @see hook_field_info().
   *
   * @return array
   */
  public function fieldInfo();

  /**
   * @see hook_field_info_alter().
   *
   * @param $info
   */
  public function fieldInfoAlter(&$info);

  /**
   * @see hook_field_schema()
   *
   * @param $field
   *
   * @return array
   */
  public function fieldSchema($field);

  /**
   * @see hook_field_settings_form().
   *
   * @param $field
   * @param $instance
   * @param $hasData
   *
   * @return array
   */
  public function fieldSettingsForm($field, $instance, $hasData);

  /**
   * @see hook_field_instance_settings_form().
   *
   * @param $field
   * @param $instance
   *
   * @return array
   */
  public function fieldInstanceSettingsForm($field, $instance);

  /**
   * @see hook_field_access().
   *
   * @param $op
   * @param $field
   * @param $entityType
   * @param $entity
   * @param $account
   *
   * @return bool
   */
  public function fieldAccess($op, $field, $entityType, $entity, $account);

  /**
   * @see hook_field_is_empty().
   *
   * @param $item
   * @param $field
   *
   * @return bool
   */
  public function fieldIsEmpty($item, $field);

  /**
   * @see hook_field_validate().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   * @param $errors
   */
  public function fieldValidate($entityType, $entity, $field, $instance, $langcode, $items, &$errors);

  /**
   * @see hook_field_presave().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   */
  public function fieldPresave($entityType, $entity, $field, $instance, $langcode, &$items);

  /**
   * @see hook_field_insert().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   */
  public function fieldInsert($entityType, $entity, $field, $instance, $langcode, &$items);

  /**
   * @see hook_field_update().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   */
  public function fieldUpdate($entityType, $entity, $field, $instance, $langcode, &$items);

  /**
   * @see hook_field_load().
   *
   * @param $entityType
   * @param $entities
   * @param $field
   * @param $instances
   * @param $langcode
   * @param $items
   * @param $age
   */
  public function fieldLoad($entityType, $entities, $field, $instances, $langcode, &$items, $age);

  /**
   * @see hook_field_delete().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   */
  public function fieldDelete($entityType, $entity, $field, $instance, $langcode, &$items);

  /**
   * @see hook_field_delete_revision().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   */
  public function fieldDeleteRevision($entityType, $entity, $field, $instance, $langcode, &$items);

  /**
   * @see hook_field_prepare_translation().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   * @param $sourceEntity
   * @param $sourceLangcode
   */
  public function fieldPrepareTranslation($entityType, $entity, $field, $instance, $langcode, &$items, $sourceEntity,
                                          $sourceLangcode);

  /**
   * @see hook_field_prepare_view().
   *
   * @param $entityType
   * @param $entities
   * @param $field
   * @param $instances
   * @param $langcode
   * @param $items
   */
  public function fieldPrepareView($entityType, $entities, $field, $instances, $langcode, &$items);

  /**
   * @see hook_field_display_alter().
   *
   * @param $display
   * @param $context
   */
  public function fieldDisplayAlter(&$display, $context);
}

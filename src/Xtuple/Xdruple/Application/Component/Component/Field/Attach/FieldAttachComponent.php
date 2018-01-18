<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\Attach;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Field Attach API (https://api.drupal.org/api/drupal/modules!field!field.attach.inc/group/field_attach/7.x)
 */
interface FieldAttachComponent
  extends Component {
  public const NAME = 'field_attach';

  /**
   * @see hook_field_attach_create_bundle()
   *
   * @param $entityType
   * @param $bundle
   */
  public function fieldAttachCreateBundle($entityType, $bundle);

  /**
   * @see hook_field_attach_rename_bundle()
   *
   * @param $entityType
   * @param $bundleOld
   * @param $bundleNew
   */
  public function fieldAttachRenameBundle($entityType, $bundleOld, $bundleNew);

  /**
   * @see hook_field_attach_delete_bundle()
   *
   * @param $entityType
   * @param $bundle
   * @param $instances
   */
  public function fieldAttachDeleteBundle($entityType, $bundle, $instances);

  /**
   * @see hook_field_attach_form()
   *
   * @param $entityType
   * @param $entity
   * @param $form
   * @param $formState
   * @param $langcode
   */
  public function fieldAttachForm($entityType, $entity, &$form, &$formState, $langcode);

  /**
   * @see hook_field_attach_validate()
   *
   * @param $entityType
   * @param $entity
   * @param $errors
   */
  public function fieldAttachValidate($entityType, $entity, &$errors);

  /**
   * @see hook_field_attach_submit()
   *
   * @param $entityType
   * @param $entity
   * @param $form
   * @param $formState
   */
  public function fieldAttachSubmit($entityType, $entity, $form, &$formState);

  /**
   * @see hook_field_attach_presave()
   *
   * @param $entityType
   * @param $entity
   */
  public function fieldAttachPresave($entityType, $entity);

  /**
   * @see hook_field_attach_insert()
   *
   * @param $entityType
   * @param $entity
   */
  public function fieldAttachInsert($entityType, $entity);

  /**
   * @see hook_field_attach_update()
   *
   * @param $entityType
   * @param $entity
   */
  public function fieldAttachUpdate($entityType, $entity);

  /**
   * @see hook_field_attach_load()
   *
   * @param        $entityType
   * @param        $entities
   * @param string $age
   * @param array  $options
   */
  public function fieldAttachLoad($entityType, $entities, $age, array $options);

  /**
   * @see hook_field_attach_delete_revision()
   *
   * @param $entityType
   * @param $entity
   */
  public function fieldAttachDeleteRevision($entityType, $entity);

  /**
   * @see hook_field_attach_delete()
   *
   * @param $entityType
   * @param $entity
   */
  public function fieldAttachDelete($entityType, $entity);

  /**
   * @see hook_field_attach_preprocess_alter()
   *
   * @param $variables
   * @param $context
   */
  public function fieldAttachPreprocessAlter(&$variables, $context);

  /**
   * @see hook_field_attach_view_alter()
   *
   * @param $output
   * @param $context
   */
  public function fieldAttachViewAlter(&$output, $context);

  /**
   * @see hook_field_available_languages_alter()
   *
   * @param $languages
   * @param $context
   */
  public function fieldAvailableLanguageAlter(&$languages, $context);

  /**
   * @see hook_field_language_alter()
   *
   * @param $displayLanguage
   * @param $context
   */
  public function fieldLanguageAlter(&$displayLanguage, $context);

  /**
   * @see hook_field_extra_fields()
   *
   * @return array
   */
  public function fieldExtraFields();

  /**
   * @see hook_field_extra_fields_alter()
   *
   * @param $info
   */
  public function fieldExtraFieldsAlter(&$info);

  /**
   * @see hook_field_extra_fields_display_alter()
   *
   * @param $displays
   * @param $context
   */
  public function fieldExtraFieldsDisplayAlter(&$displays, $context);
}

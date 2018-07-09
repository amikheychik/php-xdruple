<?php declare(strict_types=1);

/**
 * @file keeps Field Attach API hooks implementations
 */

use Xtuple\Xdruple\Application\Component\Component\Field\Attach\FieldAttachComponent;

/**
 * Implements hook_field_attach_create_bundle().
 *
 * @param $entity_type
 * @param $bundle
 */
function xdruple_field_attach_create_bundle($entity_type, $bundle) {
  _xdruple_application_field_attach_component()->fieldAttachCreateBundle($entity_type, $bundle);
}

/**
 * Implements hook_field_attach_rename_bundle().
 *
 * @param $entity_type
 * @param $bundle_old
 * @param $bundle_new
 */
function xdruple_field_attach_rename_bundle($entity_type, $bundle_old, $bundle_new) {
  _xdruple_application_field_attach_component()->fieldAttachRenameBundle($entity_type, $bundle_old, $bundle_new);
}

/**
 * Implements hook_field_attach_delete_bundle().
 *
 * @param $entity_type
 * @param $bundle
 * @param $instances
 */
function xdruple_field_attach_delete_bundle($entity_type, $bundle, $instances) {
  _xdruple_application_field_attach_component()->fieldAttachDeleteBundle($entity_type, $bundle, $instances);
}

/**
 * Implements hook_field_attach_form().
 *
 * @param          $entity_type
 * @param stdClass $entity
 * @param          $form
 * @param          $form_state
 * @param          $langcode
 */
function xdruple_field_attach_form($entity_type, $entity, &$form, &$form_state, $langcode) {
  _xdruple_application_field_attach_component()->fieldAttachForm($entity_type, $entity, $form, $form_state, $langcode);
}

/**
 * Implements hook_field_attach_validate()
 *
 * @param $entity_type
 * @param $entity
 * @param $errors
 */
function xdruple_field_attach_validate($entity_type, $entity, &$errors) {
  _xdruple_application_field_attach_component()->fieldAttachValidate($entity_type, $entity, $errors);
}

/**
 * Implements hook_field_attach_submit().
 *
 * @param $entity_type
 * @param $entity
 * @param $form
 * @param $form_state
 */
function xdruple_field_attach_submit($entity_type, $entity, $form, &$form_state) {
  _xdruple_application_field_attach_component()->fieldAttachSubmit($entity_type, $entity, $form, $form_state);
}

/**
 * Implements hook_field_attach_presave().
 *
 * @param $entity_type
 * @param $entity
 */
function xdruple_field_attach_presave($entity_type, $entity) {
  _xdruple_application_field_attach_component()->fieldAttachPresave($entity_type, $entity);
}

/**
 * Implements hook_field_attach_insert().
 *
 * @param $entity_type
 * @param $entity
 */
function xdruple_field_attach_insert($entity_type, $entity) {
  _xdruple_application_field_attach_component()->fieldAttachInsert($entity_type, $entity);
}

/**
 * Implements hook_field_attach_update().
 *
 * @param $entity_type
 * @param $entity
 */
function xdruple_field_attach_update($entity_type, $entity) {
  _xdruple_application_field_attach_component()->fieldAttachUpdate($entity_type, $entity);
}

/**
 * Implements hook_field_attach_load()
 *
 * @param        $entity_type
 * @param        $entities
 * @param string $age
 * @param array  $options
 */
function xdruple_field_attach_load($entity_type, $entities, $age = FIELD_LOAD_CURRENT, array $options = []) {
  _xdruple_application_field_attach_component()->fieldAttachLoad($entity_type, $entities, $age, $options);
}

/**
 * Implements hook_field_attach_delete_revision().
 *
 * @param $entity_type
 * @param $entity
 */
function xdruple_field_attach_delete_revision($entity_type, $entity) {
  _xdruple_application_field_attach_component()->fieldAttachDeleteRevision($entity_type, $entity);
}

/**
 * Implements hook_field_attach_delete().
 *
 * @param $entity_type
 * @param $entity
 */
function xdruple_field_attach_delete($entity_type, $entity) {
  _xdruple_application_field_attach_component()->fieldAttachDelete($entity_type, $entity);
}

/**
 * Implements hook_field_attach_preprocess_alter().
 *
 * @param $variables
 * @param $context
 */
function xdruple_field_attach_preprocess_alter(&$variables, $context) {
  _xdruple_application_field_attach_component()->fieldAttachPreprocessAlter($variables, $context);
}

/**
 * Implements hook_field_attach_view_alter().
 *
 * @param $output
 * @param $context
 */
function xdruple_field_attach_view_alter(&$output, $context) {
  _xdruple_application_field_attach_component()->fieldAttachViewAlter($output, $context);
}

/**
 * Implements hook_field_available_languages_alter().
 *
 * @param $languages
 * @param $context
 */
function xdruple_field_available_languages_alter(&$languages, $context) {
  _xdruple_application_field_attach_component()->fieldAvailableLanguageAlter($languages, $context);
}

/**
 * Implements hook_field_language_alter().
 *
 * @param $display_language
 * @param $context
 */
function xdruple_field_language_alter(&$display_language, $context) {
  _xdruple_application_field_attach_component()->fieldLanguageAlter($display_language, $context);
}

/**
 * Implements hook_field_extra_fields().
 *
 * @return array
 */
function xdruple_field_extra_fields() {
  return _xdruple_application_field_attach_component()->fieldExtraFields();
}

/**
 * Implements hook_field_extra_fields_alter().
 *
 * @param $info
 */
function xdruple_field_extra_fields_alter(&$info) {
  _xdruple_application_field_attach_component()->fieldExtraFieldsAlter($info);
}

/**
 * Implements hook_field_extra_fields_display_alter().
 *
 * @param $displays
 * @param $context
 */
function xdruple_field_extra_fields_display_alter(&$displays, $context) {
  _xdruple_application_field_attach_component()->fieldExtraFieldsDisplayAlter($displays, $context);
}

function _xdruple_application_field_attach_component(): FieldAttachComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(FieldAttachComponent::NAME);
  /** @var FieldAttachComponent $component */
  return $component;
}

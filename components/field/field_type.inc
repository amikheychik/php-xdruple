<?php declare(strict_types=1);

/**
 * @file keeps Field Types API hooks implementations
 */

use Xtuple\Xdruple\Application\Component\Component\Field\Type\FieldTypeComponent;

/**
 * Implements hook_field_info().
 *
 * @return array
 */
function xdruple_field_info() {
  return _xdruple_application_field_type_component()->fieldInfo();
}

/**
 * Implements hook_field_info_alter().
 *
 * @param $info
 */
function xdruple_field_info_alter(&$info) {
  _xdruple_application_field_type_component()->fieldInfoAlter($info);
}

/**
 * Implements hook_field_schema()
 *
 * @param $field
 *
 * @return array
 */
function xdruple_field_schema($field) {
  return _xdruple_application_field_type_component()->fieldSchema($field);
}

/**
 * Implements hook_field_settings_form().
 *
 * @param $field
 * @param $instance
 * @param $has_data
 *
 * @return array
 */
function xdruple_field_settings_form($field, $instance, $has_data) {
  return _xdruple_application_field_type_component()->fieldSettingsForm($field, $instance, $has_data);
}

/**
 * Implements hook_field_instance_settings_form().
 *
 * @param $field
 * @param $instance
 *
 * @return array
 */
function xdruple_field_instance_settings_form($field, $instance) {
  return _xdruple_application_field_type_component()->fieldInstanceSettingsForm($field, $instance);
}

/**
 * Implements hook_field_access().
 *
 * @param $op
 * @param $field
 * @param $entity_type
 * @param $entity
 * @param $account
 *
 * @return bool
 */
function xdruple_field_access($op, $field, $entity_type, $entity, $account) {
  return _xdruple_application_field_type_component()->fieldAccess($op, $field, $entity_type, $entity, $account);
}

/**
 * Implements hook_field_is_empty().
 *
 * @param $item
 * @param $field
 *
 * @return bool
 */
function xdruple_field_is_empty($item, $field) {
  return _xdruple_application_field_type_component()->fieldIsEmpty($item, $field);
}

/**
 * Implements hook_field_validate().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 * @param $errors
 */
function xdruple_field_validate($entity_type, $entity, $field, $instance, $langcode, $items, &$errors) {
  _xdruple_application_field_type_component()->fieldValidate($entity_type, $entity, $field, $instance, $langcode, $items, $errors);
}

/**
 * Implements hook_field_presave().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 */
function xdruple_field_presave($entity_type, $entity, $field, $instance, $langcode, &$items) {
  _xdruple_application_field_type_component()->fieldPresave($entity_type, $entity, $field, $instance, $langcode, $items);
}

/**
 * Implements hook_field_insert().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 */
function xdruple_field_insert($entity_type, $entity, $field, $instance, $langcode, &$items) {
  _xdruple_application_field_type_component()->fieldInsert($entity_type, $entity, $field, $instance, $langcode, $items);
}

/**
 * Implements hook_field_update().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 */
function xdruple_field_update($entity_type, $entity, $field, $instance, $langcode, &$items) {
  _xdruple_application_field_type_component()->fieldUpdate($entity_type, $entity, $field, $instance, $langcode, $items);
}

/**
 * Implements hook_field_load().
 *
 * @param $entity_type
 * @param $entities
 * @param $field
 * @param $instances
 * @param $langcode
 * @param $items
 * @param $age
 */
function xdruple_field_load($entity_type, $entities, $field, $instances, $langcode, &$items, $age) {
  _xdruple_application_field_type_component()->fieldLoad($entity_type, $entities, $field, $instances, $langcode, $items, $age);
}

/**
 * Implements hook_field_delete().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 */
function xdruple_field_delete($entity_type, $entity, $field, $instance, $langcode, &$items) {
  _xdruple_application_field_type_component()->fieldDelete($entity_type, $entity, $field, $instance, $langcode, $items);
}

/**
 * Implements hook_field_delete_revision().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 */
function xdruple_field_delete_revision($entity_type, $entity, $field, $instance, $langcode, &$items) {
  _xdruple_application_field_type_component()->fieldDeleteRevision($entity_type, $entity, $field, $instance, $langcode, $items);
}

/**
 * Implements hook_field_prepare_translation().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 * @param $langcode
 * @param $items
 * @param $source_entity
 * @param $source_langcode
 */
function xdruple_field_prepare_translation($entity_type, $entity, $field, $instance, $langcode, &$items, $source_entity,
                                           $source_langcode) {
  _xdruple_application_field_type_component()->fieldPrepareTranslation($entity_type, $entity, $field, $instance, $langcode, $items, $source_entity, $source_langcode);
}

/**
 * Implements hook_field_prepare_view().
 *
 * @param $entity_type
 * @param $entities
 * @param $field
 * @param $instances
 * @param $langcode
 * @param $items
 */
function xdruple_field_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items) {
  _xdruple_application_field_type_component()->fieldPrepareView($entity_type, $entities, $field, $instances, $langcode, $items);
}

/**
 * Implements hook_field_display_alter().
 *
 * @param $display
 * @param $context
 */
function xdruple_field_display_alter(&$display, $context) {
  _xdruple_application_field_type_component()->fieldDisplayAlter($display, $context);
}

function _xdruple_application_field_type_component(): FieldTypeComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(FieldTypeComponent::NAME);
  /** @var FieldTypeComponent $component */
  return $component;
}

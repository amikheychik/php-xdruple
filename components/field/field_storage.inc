<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Field\Storage\FieldStorageComponent;

/**
 * Implements hook_field_storage_info().
 *
 * @return array
 */
function xdruple_field_storage_info() {
  return _xdruple_application_field_storage_component()->fieldStorageInfo();
}

/**
 * Implements hook_field_storage_info_alter().
 *
 * @param $info
 */
function xdruple_field_storage_info_alter(&$info) {
  _xdruple_application_field_storage_component()->fieldStorageDetails($info);
}

/**
 * Implements hook_field_storage_details().
 *
 * @param $field
 *
 * @return array
 */
function xdruple_field_storage_details($field) {
  return _xdruple_application_field_storage_component()->fieldStorageDetails($field);
}

/**
 * Implements hook_field_storage_details_alter().
 *
 * @param $details
 * @param $field
 */
function xdruple_field_storage_details_alter(&$details, $field) {
  _xdruple_application_field_storage_component()->fieldStorageDetailsAlter($details, $field);
}

/**
 * Implements hook_field_storage_create_field().
 *
 * @param $field
 */
function xdruple_field_storage_create_field($field) {
  _xdruple_application_field_storage_component()->fieldStorageCreateField($field);
}

/**
 * Implements hook_field_storage_update_field().
 *
 * @param $field
 * @param $prior_field
 * @param $has_data
 */
function xdruple_field_storage_update_field($field, $prior_field, $has_data) {
  _xdruple_application_field_storage_component()->fieldStorageUpdateField($field, $prior_field, $has_data);
}

/**
 * Implements hook_field_storage_delete_field().
 *
 * @param $field
 */
function xdruple_field_storage_delete_field($field) {
  _xdruple_application_field_storage_component()->fieldStorageDeleteField($field);
}

/**
 * Implements hook_field_storage_delete_instance().
 *
 * @param $instance
 */
function xdruple_field_storage_delete_instance($instance) {
  _xdruple_application_field_storage_component()->fieldStorageDeleteInstance($instance);
}

/**
 * Implements hook_field_storage_pre_insert().
 *
 * @param $entity_type
 * @param $entity
 * @param $skip_fields
 */
function xdruple_field_storage_pre_insert($entity_type, $entity, &$skip_fields) {
  _xdruple_application_field_storage_component()->fieldStoragePreInsert($entity_type, $entity, $skip_fields);
}

/**
 * Implements hook_field_storage_pre_update().
 *
 * @param $entity_type
 * @param $entity
 * @param $skip_fields
 */
function xdruple_field_storage_pre_update($entity_type, $entity, &$skip_fields) {
  _xdruple_application_field_storage_component()->fieldStoragePreUpdate($entity_type, $entity, $skip_fields);
}

/**
 * Implements hook_field_storage_write().
 *
 * @param $entity_type
 * @param $entity
 * @param $op
 * @param $fields
 */
function xdruple_field_storage_write($entity_type, $entity, $op, $fields) {
  _xdruple_application_field_storage_component()->fieldStorageWrite($entity_type, $entity, $op, $fields);
}

/**
 * Implements hook_field_storage_pre_load().
 *
 * @param $entity_type
 * @param $entities
 * @param $age
 * @param $skip_fields
 * @param $options
 */
function xdruple_field_storage_pre_load($entity_type, $entities, $age, &$skip_fields, $options) {
  _xdruple_application_field_storage_component()->fieldStoragePreLoad($entity_type, $entities, $age, $skip_fields, $options);
}

/**
 * Implements hook_field_storage_load().
 *
 * @param $entity_type
 * @param $entities
 * @param $age
 * @param $fields
 * @param $options
 */
function xdruple_field_storage_load($entity_type, $entities, $age, $fields, $options) {
  _xdruple_application_field_storage_component()->fieldStorageLoad($entity_type, $entities, $age, $fields, $options);
}

/**
 * Implements hook_field_storage_purge().
 *
 * @param $entity_type
 * @param $entity
 * @param $field
 * @param $instance
 */
function xdruple_field_storage_purge($entity_type, $entity, $field, $instance) {
  _xdruple_application_field_storage_component()->fieldStoragePurge($entity_type, $entity, $field, $instance);
}

/**
 * Implements hook_field_storage_purge_field().
 *
 * @param $field
 */
function xdruple_field_storage_purge_field($field) {
  _xdruple_application_field_storage_component()->fieldStoragePurgeField($field);
}

/**
 * Implements hook_field_storage_purge_field_instance().
 *
 * @param $instance
 */
function xdruple_field_storage_purge_field_instance($instance) {
  _xdruple_application_field_storage_component()->fieldStoragePurgeFieldInstance($instance);
}

/**
 * Implements hook_field_storage_delete().
 *
 * @param $entity_type
 * @param $entity
 * @param $fields
 */
function xdruple_field_storage_delete($entity_type, $entity, $fields) {
  _xdruple_application_field_storage_component()->fieldStorageDelete($entity_type, $entity, $fields);
}

/**
 * Implements hook_field_storage_delete_revision().
 *
 * @param $entity_type
 * @param $entity
 * @param $fields
 */
function xdruple_field_storage_delete_revision($entity_type, $entity, $fields) {
  _xdruple_application_field_storage_component()->fieldStorageDeleteRevision($entity_type, $entity, $fields);
}

/**
 * Implements hook_field_storage_query().
 *
 * @param $query
 *
 * @return int|array
 */
function xdruple_field_storage_query($query) {
  return _xdruple_application_field_storage_component()->fieldStorageQuery($query);
}

function _xdruple_application_field_storage_component(): FieldStorageComponent {
  /** @var FieldStorageComponent $component */
  $component = xdruple_application()->component(FieldStorageComponent::NAME);
  return $component;
}

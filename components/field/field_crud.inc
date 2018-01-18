<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Field\CRUD\FieldCRUDComponent;

/**
 * Implements hook_field_create_field().
 *
 * @param $field
 */
function xdruple_field_create_field($field) {
  _xdruple_application_field_crud_component()->fieldCreateField($field);
}

/**
 * Implements hook_field_create_instance().
 *
 * @param $instance
 */
function xdruple_field_create_instance($instance) {
  _xdruple_application_field_crud_component()->fieldCreateInstance($instance);
}

/**
 * Implements hook_field_read_field().
 *
 * @param $field
 */
function xdruple_field_read_field($field) {
  _xdruple_application_field_crud_component()->fieldReadField($field);
}

/**
 * Implements hook_field_read_instance().
 *
 * @param $instance
 */
function xdruple_field_read_instance($instance) {
  _xdruple_application_field_crud_component()->fieldReadInstance($instance);
}

/**
 * Implements hook_field_update_forbid().
 *
 * @param $field
 * @param $prior_field
 * @param $has_data
 *
 * @throws \FieldUpdateForbiddenException
 */
function xdruple_field_update_forbid($field, $prior_field, $has_data) {
  _xdruple_application_field_crud_component()->fieldUpdateForbid($field, $prior_field, $has_data);
}

/**
 * Implements hook_field_update_field().
 *
 * @param $field
 * @param $prior_field
 * @param $has_data
 */
function xdruple_field_update_field($field, $prior_field, $has_data) {
  _xdruple_application_field_crud_component()->fieldUpdateField($field, $prior_field, $has_data);
}

/**
 * Implements hook_field_update_instance().
 *
 * @param $instance
 * @param $prior_instance
 */
function xdruple_field_update_instance($instance, $prior_instance) {
  _xdruple_application_field_crud_component()->fieldUpdateInstance($instance, $prior_instance);
}

/**
 * Implements hook_field_purge_field().
 *
 * @param $field
 */
function xdruple_field_purge_field($field) {
  _xdruple_application_field_crud_component()->fieldPurgeField($field);
}

/**
 * Implements hook_field_purge_instance().
 *
 * @param $instance
 */
function xdruple_field_purge_instance($instance) {
  _xdruple_application_field_crud_component()->fieldPurgeInstance($instance);
}

/**
 * Implements hook_field_delete_field().
 *
 * @param $field
 */
function xdruple_field_delete_field($field) {
  _xdruple_application_field_crud_component()->fieldDeleteField($field);
}

/**
 * Implements hook_field_delete_instance().
 *
 * @param $instance
 */
function xdruple_field_delete_instance($instance) {
  _xdruple_application_field_crud_component()->fieldDeleteInstance($instance);
}

function _xdruple_application_field_crud_component(): FieldCRUDComponent {
  /** @var FieldCRUDComponent $component */
  $component = xdruple_application()->component(FieldCRUDComponent::NAME);
  return $component;
}

<?php declare(strict_types=1);

/**
 * @file keeps implementations of the hooks from node.api.php
 */

use Xtuple\Xdruple\Application\Component\Component\Entity\Type\Node\NodeComponent;

/**
 * Implements hook_node_info().
 *
 */
function xdruple_node_info() {
  return _xdruple_application_node_component()->nodeInfo();
}

/**
 * Implements hook_node_type_insert().
 *
 * @param $info
 */
function xdruple_node_type_insert($info) {
  _xdruple_application_node_component()->nodeTypeInsert($info);
}

/**
 * Implements hook_node_type_update().
 *
 * @param $info
 */
function xdruple_node_type_update($info) {
  _xdruple_application_node_component()->nodeTypeUpdate($info);
}

/**
 * Implements hook_node_type_delete().
 *
 * @param $info
 */
function xdruple_node_type_delete($info) {
  _xdruple_application_node_component()->nodeTypeDelete($info);
}

/**
 * Implements hook_prepare().
 *
 * @param $node
 */
function xdruple_prepare($node) {
  _xdruple_application_node_component()->prepare($node);
}

/**
 * Implements hook_form().
 *
 * @param $node
 * @param $form_state
 *
 * @return array
 */
function xdruple_form($node, &$form_state) {
  return _xdruple_application_node_component()->form($node, $form_state);
}

/**
 * Implements hook_validate().
 *
 * @param $node
 * @param $form
 * @param $form_state
 */
function xdruple_validate($node, $form, &$form_state) {
  _xdruple_application_node_component()->validate($node, $form, $form_state);
}

/**
 * Implements hook_insert().
 *
 * @param $node
 */
function xdruple_insert($node) {
  _xdruple_application_node_component()->insert($node);
}

/**
 * Implements hook_update().
 *
 * @param $node
 */
function xdruple_update($node) {
  _xdruple_application_node_component()->update($node);
}

/**
 * Implements hook_load().
 *
 * @param $nodes
 */
function xdruple_load($nodes) {
  _xdruple_application_node_component()->load($nodes);
}

/**
 * Implements hook_view().
 *
 * @param $node
 * @param $view_mode
 * @param $langcode
 *
 * @return \stdClass
 */
function xdruple_view($node, $view_mode, $langcode) {
  return _xdruple_application_node_component()->view($node, $view_mode, $langcode);
}

/**
 * Implements hook_delete().
 *
 * @param $node
 */
function xdruple_delete($node) {
  _xdruple_application_node_component()->delete($node);
}

/**
 * Implements hook_node_prepare().
 *
 * @param $node
 */
function xdruple_node_prepare($node) {
  _xdruple_application_node_component()->nodePrepare($node);
}

/**
 * Implements hook_node_validate().
 *
 * @param $node
 * @param $form
 * @param $form_state
 */
function xdruple_node_validate($node, $form, &$form_state) {
  _xdruple_application_node_component()->nodeValidate($node, $form, $form_state);
}

/**
 * Implements hook_node_submit().
 *
 * @param $node
 * @param $form
 * @param $form_state
 */
function xdruple_node_submit($node, $form, &$form_state) {
  _xdruple_application_node_component()->nodeSubmit($node, $form, $form_state);
}

/**
 * Implements hook_node_presave().
 *
 * @param $node
 */
function xdruple_node_presave($node) {
  _xdruple_application_node_component()->nodePresave($node);
}

/**
 * Implements hook_node_insert().
 *
 * @param $node
 */
function xdruple_node_insert($node) {
  _xdruple_application_node_component()->nodeInsert($node);
}

/**
 * Implements hook_node_update().
 *
 * @param $node
 */
function xdruple_node_update($node) {
  _xdruple_application_node_component()->nodeUpdate($node);
}

/**
 * Implements hook_node_load().
 *
 * @param $nodes
 * @param $types
 */
function xdruple_node_load($nodes, $types) {
  _xdruple_application_node_component()->nodeLoad($nodes, $types);
}

/**
 * Implements hook_node_view().
 *
 * @param $node
 * @param $view_mode
 * @param $langcode
 */
function xdruple_node_view($node, $view_mode, $langcode) {
  _xdruple_application_node_component()->nodeView($node, $view_mode, $langcode);
}

/**
 * Implements hook_node_view_alter().
 *
 * @param $build
 */
function xdruple_node_view_alter(&$build) {
  _xdruple_application_node_component()->nodeViewAlter($build);
}

/**
 * Implements hook_node_revision_delete().
 *
 * @param $node
 */
function xdruple_node_revision_delete($node) {
  _xdruple_application_node_component()->nodeRevisionDelete($node);
}

/**
 * Implements hook_node_delete().
 *
 * @param $node
 */
function xdruple_node_delete($node) {
  _xdruple_application_node_component()->nodeDelete($node);
}

/**
 * Implements hook_node_access().
 *
 * @param $node
 * @param $op
 * @param $account
 *
 * @return string
 */
function xdruple_node_access($node, $op, $account) {
  return _xdruple_application_node_component()->nodeAccess($node, $op, $account);
}

/**
 * Implements hook_node_access_records().
 *
 * @param $node
 *
 * @return array
 */
function xdruple_node_access_records($node) {
  return _xdruple_application_node_component()->nodeAccessRecords($node);
}

/**
 * Implements hook_node_access_records_alter().
 *
 * @param $grants
 * @param $node
 */
function xdruple_node_access_records_alter(&$grants, $node) {
  _xdruple_application_node_component()->nodeAccessRecordsAlter($grants, $node);
}

/**
 * Implements hook_node_grants().
 *
 * @param $account
 * @param $op
 *
 * @return array
 */
function xdruple_node_grants($account, $op) {
  return _xdruple_application_node_component()->nodeGrants($account, $op);
}

/**
 * Implements hook_node_grants_alter().
 *
 * @param $grants
 * @param $account
 * @param $op
 */
function xdruple_node_grants_alter(&$grants, $account, $op) {
  _xdruple_application_node_component()->nodeGrantsAlter($grants, $account, $op);
}

/**
 * Implements hook_node_operations().
 *
 * @return array
 */
function xdruple_node_operations() {
  return _xdruple_application_node_component()->nodeOperations();
}

/**
 * Implements hook_ranking().
 *
 * @return array
 */
function xdruple_ranking() {
  return _xdruple_application_node_component()->ranking();
}

/**
 * Implements hook_node_update_index().
 *
 * @param $node
 *
 * @return string
 */
function xdruple_node_update_index($node) {
  return _xdruple_application_node_component()->nodeUpdateIndex($node);
}

/**
 * Implements hook_node_search_result().
 *
 * @param $node
 *
 * @return array
 */
function xdruple_node_search_result($node) {
  return _xdruple_application_node_component()->nodeSearchResult($node);
}

/**
 * Implements entity URI callback
 *
 * @see hook_entity_info()
 * @see node_uri()
 *
 * @param $node
 *
 * @return array
 */
function xdruple_node_uri($node) {
  return _xdruple_application_node_component()->nodeUri($node);
}

function _xdruple_application_node_component(): NodeComponent {
  /** @var NodeComponent $component */
  $component = xdruple_application()->component(NodeComponent::NAME);
  return $component;
}

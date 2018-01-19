<?php declare(strict_types=1);

/**
 * @file keeps Drupal form hooks implementations
 * @see  https://api.drupal.org/api/drupal/includes!form.inc/group/form_api/7
 */

use Xtuple\Xdruple\Application\Component\Component\System\Form\Form\FormComponent;

/**
 * Implements hook_forms().
 *
 * @param string $form_id
 * @param array  $args
 *
 * @return array
 */
function xdruple_forms($form_id, $args) {
  return _xdruple_application_form_component()->forms($form_id, $args);
}

/**
 * Form builder callback for all xDruple forms.
 *
 * Simply passes the form back to Drupal, so it's prepared. Actual building is done in xdruple_form_alter(), so it's
 * standardized with all regular Drupal forms.
 *
 * @param array $form
 *
 * @return array
 * @see xdruple_form_alter()
 */
function xdruple_form_builder($form) {
  return $form;
}

/**
 * Implements hook_form_alter().
 *
 * hook_form_BASE_FORM_ID_alter() and hook_form_FORM_ID_alter() are called right after their module hook_form_alter(),
 * as as xdruple_module_implements_alter() pushes xdruple_form_alter() to the bottom of the list, this function is
 * called last, thus form object should have all fields built or altered.
 * (NB. Technically speaking, admin_menu_form_alter() is called the last one, but it doesn't matter).
 *
 * @param array $form
 * @param array $form_state
 */
function xdruple_form_alter(&$form, &$form_state) {
  _xdruple_application_form_component()->formBuild($form, $form_state);
}

function xdruple_form_process($element, &$form_state) {
  return _xdruple_application_form_component()->formProcess($element, $form_state);
}

/**
 * @param array $form
 * @param array $form_state
 *
 * @return array
 */
function xdruple_form_after_build($form, &$form_state) {
  return _xdruple_application_form_component()->formAfterBuild($form, $form_state);
}

/**
 * @param array $form
 *
 * @return array
 */
function xdruple_form_pre_render($form) {
  return _xdruple_application_form_component()->formPreRender($form);
}

/**
 * @param string $output
 * @param array  $form
 *
 * @return array
 */
function xdruple_form_post_render($output, $form) {
  return _xdruple_application_form_component()->formPostRender($output, $form);
}

/**
 * @param array $form
 * @param array $form_state
 */
function xdruple_form_validate($form, &$form_state) {
  _xdruple_application_form_component()->formValidate($form, $form_state);
}

/**
 * @param array $form
 * @param array $form_state
 */
function xdruple_form_post_validate($form, &$form_state) {
  _xdruple_application_form_component()->formPostValidate($form, $form_state);
}

/**
 * @param array $form
 * @param array $form_state
 */
function xdruple_form_submit($form, &$form_state) {
  _xdruple_application_form_component()->formSubmit($form, $form_state);
}

/**
 * @param array $form
 * @param array $form_state
 */
function xdruple_form_post_submit($form, &$form_state) {
  _xdruple_application_form_component()->formPostSubmit($form, $form_state);
}

/**
 * @param array $form
 * @param array $form_state
 *
 * @return array
 */
function xdruple_form_ajax_callback($form, $form_state) {
  return _xdruple_application_form_component()->formAjax($form, $form_state);
}

function _xdruple_application_form_component(): FormComponent {
  /** @var FormComponent $component */
  $component = xdruple_application()->component(FormComponent::NAME);
  return $component;
}

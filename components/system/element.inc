<?php declare(strict_types=1);

/**
 * @file keeps implementation for the Form Element API.
 * @see  https://www.drupal.org/node/169815
 */

use Xtuple\Xdruple\Application\Component\Component\System\Form\Element\ElementComponent;

/**
 * Implements hook_element_info().
 */
function xdruple_element_info() {
  return _xdruple_application_element_component()->elementInfo();
}

/**
 * Implements hook_element_info_alter().
 *
 * @param $types
 */
function xdruple_element_info_alter(&$types) {
  _xdruple_application_element_component()->elementInfoAlter($types);
}

/**
 * Implements hook_element_info() #value_callback.
 *
 * @param array $element
 * @param bool  $input
 * @param null  $form_state
 *
 * @return mixed
 */
function xdruple_form_element_value(&$element, $input = false, &$form_state = null) {
  return _xdruple_application_element_component()->elementValue($element, $input, $form_state);
}

/**
 * Implements hook_element_info() #process.
 *
 * @param array $element
 * @param array $form_state
 * @param array $form
 *
 * @return array
 */
function xdruple_form_element_process($element, $form_state, $form) {
  return _xdruple_application_element_component()->elementProcess($element, $form_state, $form);
}

/**
 * Implements hook_element_info() #after_build.
 *
 * @param array $element
 * @param array $form_state
 *
 * @return array
 */
function xdruple_form_element_after_build($element, &$form_state) {
  return _xdruple_application_element_component()->elementAfterBuild($element, $form_state);
}

/**
 * Implements hook_element_info() #pre_render.
 *
 * @param array $element
 *
 * @return array
 */
function xdruple_form_element_pre_render($element) {
  return _xdruple_application_element_component()->elementPreRender($element);
}

/**
 * Implements hook_element_info() #post_render.
 *
 * @param string $markup
 * @param array  $element
 *
 * @return string
 */
function xdruple_form_element_post_render($markup, $element) {
  return _xdruple_application_element_component()->elementPostRender($markup, $element);
}

/**
 * Implements hook_element_info() #element_validate.
 *
 * @param array $element
 * @param array $form_state
 * @param array $form
 */
function xdruple_form_element_validate($element, &$form_state, $form) {
  _xdruple_application_element_component()->elementValidate($element, $form_state, $form);
}

/**
 * Implements hook_element_info() #ajax callback.
 *
 * @param array $form
 * @param array $form_state
 *
 * @return array
 */
function xdruple_form_element_ajax($form, $form_state) {
  return _xdruple_application_element_component()->elementAjax($form, $form_state);
}

function _xdruple_application_element_component(): ElementComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(ElementComponent::NAME);
  /** @var ElementComponent $component */
  return $component;
}

<?php declare(strict_types=1);

/**
 * @file template file for Webform component.
 *
 * - `component_name` should be replaced by the actual component name.
 */

/**
 * Implements _webform_defaults_component().
 *
 * @return array
 */
function _webform_defaults_component_name() {
  return _xdruple_application_webform_component('component_name')->defaults();
}

/**
 * Implements _webform_edit_component().
 *
 * @param array $component
 *
 * @return array
 */
function _webform_edit_component_name($component) {
  return _xdruple_application_webform_component('component_name')->edit($component);
}

/**
 * Implements _webform_render_component().
 *
 * @param      $component
 * @param null $value
 * @param bool $filter
 * @param null $submission
 *
 * @return array
 */
function _webform_render_component_name($component, $value = null, $filter = true, $submission = null) {
  return _xdruple_application_webform_component('component_name')->render($component, $value, $filter, $submission);
}

/**
 * Implements _webform_display_component().
 *
 * @param array  $component
 * @param array  $value
 * @param string $format
 * @param array  $submission
 *
 * @return array
 */
function _webform_display_component_name($component, $value, $format = 'html', $submission = []) {
  return _xdruple_application_webform_component('component_name')->display($component, $value, $format, $submission);
}

/**
 * Implements _webform_action_set_component().
 *
 * @param array  $component
 * @param array  $element
 * @param array  $form_state
 * @param string $value
 */
function _webform_action_set_component_name($component, &$element, &$form_state, $value) {
  _xdruple_application_webform_component('component_name')->actionSet($component, $element, $form_state, $value);
}

/**
 * Implements _webform_submit_component().
 *
 * @param array $component
 * @param       $value
 *
 * @return array
 */
function _webform_submit_component_name($component, $value) {
  return _xdruple_application_webform_component('component_name')->submit($component, $value);
}

/**
 * Implements _webform_delete_component().
 *
 * @param array $component
 * @param array $value
 */
function _webform_delete_component_name($component, $value) {
  _xdruple_application_webform_component('component_name')->delete($component, $value);
}

/**
 * Implements _webform_help_component().
 *
 * @param string $section
 *
 * @return string
 */
function _webform_help_component_name($section) {
  return _xdruple_application_webform_component('component_name')->help($section);
}

/**
 * Implements _webform_theme_component().
 *
 * @return array
 */
function _webform_theme_component_name() {
  return _xdruple_application_webform_component('component_name')->theme();
}

/**
 * Implements _webform_analysis_component().
 *
 * @param array $component
 * @param array $sids
 * @param bool  $single
 * @param null  $join
 *
 * @return array
 */
function _webform_analysis_component_name($component, $sids = [], $single = false, $join = null) {
  return _xdruple_application_webform_component('component_name')->analysis($component, $sids, $single, $join);
}

/**
 * Implements _webform_table_component().
 *
 * @param array $component
 * @param array $value
 *
 * @return string
 */
function _webform_table_component_name($component, $value) {
  return _xdruple_application_webform_component('component_name')->table($component, $value);
}

/**
 * Implements _webform_attachments_component().
 *
 * @param array $component
 * @param array $value
 *
 * @return array
 */
function _webform_attachments_component_name($component, $value) {
  return _xdruple_application_webform_component('component_name')->attachments($component, $value);
}

/**
 * Implements _webform_csv_headers_component().
 *
 * @param array $component
 * @param array $export_options
 *
 * @return array
 */
function _webform_csv_headers_component_name($component, $export_options) {
  return _xdruple_application_webform_component('component_name')->csvHeaders($component, $export_options);
}

/**
 * Implements _webform_csv_data_component().
 *
 * @param array $component
 * @param array $export_options
 * @param array $value
 *
 * @return array
 */
function _webform_csv_data_component_name($component, $export_options, $value) {
  return _xdruple_application_webform_component('component_name')->csvData($component, $export_options, $value);
}

/**
 * Implements _webform_view_field_component().
 *
 * @param array $component
 * @param array $fields
 *
 * @return array
 */
function _webform_view_field_component_name($component, $fields) {
  return _xdruple_application_webform_component('component_name')->viewField($component, $fields);
}

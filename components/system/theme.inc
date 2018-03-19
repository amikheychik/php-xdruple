<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\System\Theme\ThemeComponent;

/**
 * Implements hook_theme().
 *
 * @param array  $existing
 * @param string $type
 * @param string $theme
 * @param string $path
 *
 * @return array
 */
function xdruple_theme($existing, $type, $theme, $path) {
  return _xdruple_application_theme_component()->theme($existing, $type, $theme, $path);
}

/**
 * Implements hook_theme_registry_alter().
 *
 * @param array $theme_registry
 */
function xdruple_theme_registry_alter(&$theme_registry) {
  _xdruple_application_theme_component()->themeRegistryAlter($theme_registry);
}

/**
 * @see drupal_render()
 *
 * @param array $element
 *
 * @return array
 */
function xdruple_theme_form_element_pre_render($element) {
  return _xdruple_application_theme_component()->themeFormElementPreRender($element);
}

/**
 * @see drupal_render()
 *
 * @param string $children
 * @param array  $element
 *
 * @return string - re-assigned as $element['#children']
 */
function xdruple_theme_form_element_post_render($children, $element) {
  return _xdruple_application_theme_component()->themeFormElementPostRender($children, $element);
}

/**
 * @see drupal_render()
 *
 * @param array $variables
 */
function template_preprocess_xdruple(&$variables) {
  _xdruple_application_theme_component()->templatePreprocess($variables);
}

/**
 * @see drupal_render()
 *
 * @param array $variables
 */
function template_process_xdruple(&$variables) {
  _xdruple_application_theme_component()->templateProcess($variables);
}

/**
 * @see drupal_render()
 *
 * @param array $variables
 *
 * @return string
 */
function theme_xdruple($variables) {
  return _xdruple_application_theme_component()->render($variables);
}

function _xdruple_application_theme_component(): ThemeComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(ThemeComponent::NAME);
  /** @var ThemeComponent $component */
  return $component;
}

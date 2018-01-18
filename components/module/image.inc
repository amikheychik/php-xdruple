<?php declare(strict_types=1);

/**
 * @file keeps Image API hooks implementations
 *
 * @see  https://api.drupal.org/api/drupal/modules!image!image.api.php/7
 */

use Xtuple\Xdruple\Application\Component\Component\Module\Image\ImageComponent;

/**
 * Implements hook_image_effect_info().
 *
 * @return array
 */
function xdruple_image_effect_info() {
  return _xdruple_application_image_component()->imageEffectInfo();
}

/**
 * Implements hook_image_effect_info_alter().
 *
 * @param array $effects
 */
function xdruple_image_effect_info_alter(&$effects) {
  _xdruple_application_image_component()->imageEffectInfoAlter($effects);
}

/**
 * Implements hook_image_default_styles().
 *
 * @return array
 */
function xdruple_image_default_styles() {
  return _xdruple_application_image_component()->imageDefaultStyles();
}

/**
 * Implements hook_image_styles_alter().
 *
 * @param array $styles
 */
function xdruple_image_styles_alter(&$styles) {
  _xdruple_application_image_component()->imageStylesAlter($styles);
}

/**
 * Implements hook_image_style_save().
 *
 * @param array $style
 */
function xdruple_image_style_save($style) {
  _xdruple_application_image_component()->imageStyleSave($style);
}

/**
 * Implements hook_image_style_delete().
 *
 * @param array $style
 */
function xdruple_image_style_delete($style) {
  _xdruple_application_image_component()->imageStyleDelete($style);
}

/**
 * Implements hook_image_style_flush().
 *
 * @param array $style
 */
function xdruple_image_style_flush($style) {
  _xdruple_application_image_component()->imageStyleFlush($style);
}

function _xdruple_application_image_component(): ImageComponent {
  /** @var ImageComponent $image */
  $image = xdruple_application()->component(ImageComponent::NAME);
  return $image;
}

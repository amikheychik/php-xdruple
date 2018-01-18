<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\Widget;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Field Widget API (https://api.drupal.org/api/drupal/modules!field!field.api.php/group/field_widget/7)
 * @see Field Types API (https://api.drupal.org/api/drupal/modules!field!field.api.php/group/field_types/7)
 */
interface FieldWidgetComponent
  extends Component {
  public const NAME = 'field_widget';

  /**
   * @see hook_field_widget_info().
   *
   * @return array
   */
  public function fieldWidgetInfo();

  /**
   * @see hook_field_widget_info_alter().
   *
   * @param $info
   */
  public function fieldWidgetInfoAlter(&$info);

  /**
   * @see hook_field_widget_form().
   *
   * @param $form
   * @param $formState
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   * @param $delta
   * @param $element
   *
   * @return array
   */
  public function fieldWidgetForm(&$form, &$formState, $field, $instance, $langcode, $items, $delta, $element);

  /**
   * @see hook_field_widget_form_alter().
   *
   * @param $element
   * @param $formState
   * @param $context
   */
  public function fieldWidgetFormAlter(&$element, &$formState, $context);

  /**
   * @see hook_field_widget_error().
   *
   * @param $element
   * @param $error
   * @param $form
   * @param $formState
   */
  public function fieldWidgetError($element, $error, $form, &$formState);

  /**
   * @see hook_field_widget_properties_alter().
   *
   * @param $widget
   * @param $context
   */
  public function fieldWidgetPropertiesAlter(&$widget, $context);

  /**
   * @see hook_field_widget_settings_form().
   *
   * @param $field
   * @param $instance
   *
   * @return array
   */
  public function fieldWidgetSettingsForm($field, $instance);
}

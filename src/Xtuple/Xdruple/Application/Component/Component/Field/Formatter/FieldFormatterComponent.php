<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Field\Formatter;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Field Formatter API (https://api.drupal.org/api/drupal/modules!field!field.api.php/group/field_formatter/7)
 * @see Field Types API (https://api.drupal.org/api/drupal/modules!field!field.api.php/group/field_types/7)
 */
interface FieldFormatterComponent
  extends Component {
  public const NAME = 'field_formatter';

  /**
   * @see hook_field_formatter_info().
   *
   * @return array
   */
  public function fieldFormatterInfo();

  /**
   * @see hook_field_formatter_info_alter().
   *
   * @param $info
   */
  public function fieldFormatterInfoAlter(&$info);

  /**
   * @see hook_field_formatter_prepare_view().
   *
   * @param       $entityType
   * @param array $entities
   * @param       $field
   * @param       $instances
   * @param       $langcode
   * @param       $items
   * @param       $displays
   */
  public function fieldFormatterPrepareView($entityType, $entities, $field, $instances, $langcode, &$items, $displays);

  /**
   * @see hook_field_formatter_view().
   *
   * @param $entityType
   * @param $entity
   * @param $field
   * @param $instance
   * @param $langcode
   * @param $items
   * @param $display
   *
   * @return array
   */
  public function fieldFormatterView($entityType, $entity, $field, $instance, $langcode, $items, $display);

  /**
   * @see hook_field_formatter_settings_summary().
   *
   * @param $field
   * @param $instance
   * @param $viewMode
   *
   * @return string
   */
  public function fieldFormatterSettingsSummary($field, $instance, $viewMode);

  /**
   * @see hook_field_formatter_settings_form().
   *
   * @param $field
   * @param $instance
   * @param $viewMode
   * @param $form
   * @param $formState
   *
   * @return array
   */
  public function fieldFormatterSettingsForm($field, $instance, $viewMode, $form, &$formState);
}

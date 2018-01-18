<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\Filter;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see https://api.drupal.org/api/drupal/modules!filter!filter.api.php/7
 */
interface FilterComponent
  extends Component {
  public const NAME = 'filter';

  /**
   * @see hook_filter_info().
   *
   * @return array
   */
  public function filterInfo();

  /**
   * @see hook_filter_info_alter().
   *
   * @param array $info
   */
  public function filterInfoAlter(&$info);

  /**
   * @see hook_filter_format_insert().
   *
   * @param \stdClass $format
   */
  public function filterFormatInsert($format);

  /**
   * @see hook_filter_format_update().
   *
   * @param \stdClass $format
   */
  public function filterFormatUpdate($format);

  /**
   * @see hook_filter_format_disable().
   *
   * @param \stdClass $format
   */
  public function filterFormatDisable($format);

  /**
   * @see callback_filter_settings()
   *
   * @param array       $form
   * @param array       $formState
   * @param \stdClass   $filter
   * @param \stdClass   $format
   * @param array       $defaults
   * @param \stdClass[] $filters
   *
   * @return array
   */
  public function filterSettings($form, &$formState, $filter, $format, $defaults, $filters);

  /**
   * @see callback_filter_prepare()
   *
   * @param string    $text
   * @param \stdClass $filter
   * @param \stdClass $format
   * @param string    $langcode
   * @param bool      $cache
   * @param string    $cacheId
   *
   * @return string
   */
  public function filterPrepare($text, $filter, $format, $langcode, $cache, $cacheId);

  /**
   * @see callback_filter_process()
   *
   * @param string    $text
   * @param \stdClass $filter
   * @param \stdClass $format
   * @param string    $langcode
   * @param bool      $cache
   * @param string    $cacheId
   *
   * @return string
   */
  public function filterProcess($text, $filter, $format, $langcode, $cache, $cacheId);

  /**
   * @see callback_filter_tips()
   *
   * @param \stdClass $filter
   * @param \stdClass $format
   * @param bool      $long
   *
   * @return string
   *
   */
  public function filterTips($filter, $format, $long);
}

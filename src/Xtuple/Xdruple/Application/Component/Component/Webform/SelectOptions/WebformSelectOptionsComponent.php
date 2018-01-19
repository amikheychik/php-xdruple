<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\SelectOptions;

interface WebformSelectOptionsComponent {
  public const NAME = 'webform_select_options';

  /**
   * @see hook_webform_select_options_info()
   *
   * @return array
   */
  public function webformSelectOptionsInfo();

  /**
   * @see hook_webform_select_options_info_alter()
   *
   * @param array[] $items
   */
  public function webformSelectOptionsInfoAlter(&$items);

  /**
   * @see callback_webform_options()
   *
   * @param array $component
   * @param bool  $flat
   * @param array $arguments
   *
   * @return mixed
   */
  public function webformSelectOptions($component, $flat, $arguments);
}

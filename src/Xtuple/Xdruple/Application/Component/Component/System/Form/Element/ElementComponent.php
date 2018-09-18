<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Form\Element;

use Xtuple\Xdruple\Application\Component\Component;

interface ElementComponent
  extends Component {
  public const NAME = 'element';

  /**
   * @see hook_element_info()
   *
   * @return array
   */
  public function elementInfo();

  /**
   * @see hook_element_info_alter()
   *
   * @param array $types
   */
  public function elementInfoAlter(&$types);

  /**
   * @see hook_element_info() #value_callback.
   *
   * @param array      $element
   * @param bool       $input
   * @param array|null $formState
   *
   * @return mixed|null
   */
  public function elementValue(array &$element, $input = false, ?array &$formState = null);

  /**
   * @see hook_element_info() #process.
   *
   * @param array $element
   * @param array $formState
   * @param array $form
   *
   * @return array
   */
  public function elementProcess(array $element, array $formState, array $form): array;

  /**
   * @see hook_element_info() #after_build.
   *
   * @param array $element
   * @param array $formState
   *
   * @return array
   */
  public function elementAfterBuild(array $element, array &$formState): array;

  /**
   * @see hook_element_info() #pre_render.
   *
   * @param array $element
   *
   * @return array
   */
  public function elementPreRender(array $element): array;

  /**
   * @see hook_element_info() #post_render.
   *
   * @param string $markup
   * @param array  $element
   *
   * @return string
   */
  public function elementPostRender(string $markup, array $element): string;

  /**
   * Implements hook_element_info() #element_validate.
   *
   * @param array $element
   * @param array $formState
   * @param array $form
   */
  public function elementValidate(array $element, array &$formState, array $form): void;

  /**
   * @see hook_element_info() #ajax callback.
   *
   * @param array $form
   * @param array $formState
   *
   * @return array
   */
  public function elementAjax(array $form, array $formState): array;
}

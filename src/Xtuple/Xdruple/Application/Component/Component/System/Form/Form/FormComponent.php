<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Form\Form;

use Xtuple\Xdruple\Application\Component\Component;

interface FormComponent
  extends Component {
  public const NAME = 'form';

  /**
   * @param string $formId
   * @param array  $args
   *
   * @return array
   */
  public function forms($formId, $args = []);

  /**
   * @param array $form
   * @param array $formState
   */
  public function formBuild(&$form, &$formState);

  /**
   * @param array $form
   * @param array $formState
   *
   * @return array
   */
  public function formProcess($form, &$formState);

  /**
   * @param array $form
   * @param array $formState
   *
   * @return array
   */
  public function formAfterBuild($form, &$formState);

  /**
   * @param array $form
   *
   * @return array
   */
  public function formPreRender($form);

  /**
   * @param string $output
   * @param array  $form
   *
   * @return array
   */
  public function formPostRender($output, $form);

  /**
   * @param array $form
   * @param array $formState
   */
  public function formValidate($form, &$formState);

  /**
   * @param array $form
   * @param array $formState
   */
  public function formPostValidate($form, &$formState);

  /**
   * @param array $form
   * @param array $formState
   */
  public function formSubmit($form, &$formState);

  /**
   * @param array $form
   * @param array $formState
   */
  public function formPostSubmit($form, &$formState);

  /**
   * @param array $form
   * @param array $formState
   *
   * @return array
   */
  public function formAjax($form, $formState);
}

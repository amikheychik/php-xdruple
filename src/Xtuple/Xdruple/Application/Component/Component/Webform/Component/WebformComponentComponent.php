<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component;

use Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\WebformComponent;

interface WebformComponentComponent {
  public const NAME = 'webform_component_component';

  public function webformComponent(string $name): ?WebformComponent;

  /**
   * @see hook_webform_component_info()
   *
   * @return array
   */
  public function webformComponentInfo();

  /**
   * @see hook_webform_component_info_alter()
   *
   * @param array $components
   */
  public function webformComponentInfoAlter(&$components);

  /**
   * @see hook_webform_component_defaults_alter()
   *
   * @param array  $defaults
   * @param string $type
   */
  public function webformComponentDefaultsAlter(&$defaults, $type);

  /**
   * @see hook_webform_component_render_alter()
   *
   * @param array $element
   * @param array $component
   */
  public function webformComponentRenderAlter(&$element, &$component);

  /**
   * @see hook_webform_component_display_alter()
   *
   * @param array $element
   * @param array $component
   */
  public function webformComponentDisplayAlter(&$element, &$component);

  /**
   * @see hook_webform_analysis_component_data_alter()
   *
   * @param array $data
   * @param       $node
   * @param array $component
   */
  public function webformAnalysisComponentDataAlter(&$data, $node, $component);

  /**
   * @see hook_webform_component_presave()
   *
   * @param array $component
   */
  public function webformComponentPresave(&$component);

  /**
   * @see hook_webform_component_insert()
   *
   * @param array $component
   */
  public function webformComponentInsert($component);

  /**
   * @see hook_webform_component_update()
   *
   * @param array $component
   */
  public function webformComponentUpdate($component);

  /**
   * @see hook_webform_component_delete()
   *
   * @param $component
   */
  public function webformComponentDelete($component);
}

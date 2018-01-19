<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Webform;

interface WebformComponent {
  public const NAME = 'webform_component';

  /**
   * @see hook_webform_analysis_alter()
   *
   * @param array $analysis - Drupal render array
   */
  public function webformAnalysisAlter(&$analysis);

  /**
   * @see hook_webform_node_defaults_alter()
   *
   * @param array $defaults
   */
  public function webformNodeDefaultsAlter(&$defaults);

  /**
   * @see hook_webform_view_alter()
   *
   * @param \view  $view
   * @param string $displayId
   * @param array  $args
   */
  public function webformViewAlter($view, $displayId, $args);

  /**
   * @see hook_webform_html_capable_mail_systems_alter()
   *
   * @param array $systems
   */
  public function webformHtmlCapableMailSystemsAlter(&$systems);
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Theme;

use Xtuple\Xdruple\Application\Component\Component;

interface ThemeComponent
  extends Component {
  public const NAME = 'theme';

  /**
   * @see hook_theme()
   *
   * @param array  $existing
   * @param string $type
   * @param string $theme
   * @param string $path
   *
   * @return array
   */
  public function theme($existing, $type, $theme, $path);

  /**
   * @see hook_theme_registry_alter().
   *
   * @param array $themeRegistry
   */
  public function themeRegistryAlter(&$themeRegistry);

  /**
   * @param array $element
   *
   * @return array
   */
  public function themeFormElementPreRender($element);

  /**
   * @param string $children
   * @param array  $element
   *
   * @return string
   */
  public function themeFormElementPostRender($children, $element);

  /**
   * @param array $variables
   */
  public function templatePreprocess(&$variables);

  /**
   * @param array $variables
   */
  public function templateProcess(&$variables);

  /**
   * @param array $variables
   *
   * @return string
   */
  public function render($variables);
}

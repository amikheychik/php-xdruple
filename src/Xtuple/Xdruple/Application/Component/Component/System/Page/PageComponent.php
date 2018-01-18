<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Page;

use Xtuple\Xdruple\Application\Component\Component;

interface PageComponent
  extends Component {
  public const NAME = 'page';

  /**
   * @see hook_page_delivery_callback_alter().
   *
   * @param string $callback
   */
  public function pageDeliveryCallbackAlter(&$callback);

  /**
   * @see hook_html_head_alter().
   *
   * @param array $headElements
   */
  public function htmlHeadAlter(&$headElements);

  /**
   * @see hook_css_alter().
   *
   * @param array $css
   */
  public function cssAlter(&$css);

  /**
   * @see hook_js_alter().
   *
   * @param array $javascript
   */
  public function jsAlter(&$javascript);

  /**
   * @see hook_page_build().
   *
   * @param array $page
   */
  public function pageBuild(&$page);

  /**
   * @see hook_page_alter().
   *
   * @param array $page
   */
  public function pageAlter(&$page);
}

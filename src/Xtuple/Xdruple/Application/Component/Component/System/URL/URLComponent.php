<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\URL;

use Xtuple\Xdruple\Application\Component\Component;

interface URLComponent
  extends Component {
  public const NAME = 'url';

  /**
   * @see hook_url_inbound_alter().
   *
   * @param string $path
   * @param string $originalPath
   * @param string $pathLanguage
   */
  public function urlInboundAlter(&$path, $originalPath, $pathLanguage);

  /**
   * @see hook_url_outbound_alter().
   *
   * @param string $path
   * @param array  $options
   * @param string $originalPath
   */
  public function urlOutboundAlter(&$path, &$options, $originalPath);
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token;

use Xtuple\Xdruple\Application\Component\Component;

interface TokenComponent
  extends Component {
  public const NAME = 'token';

  /**
   * @see hook_token_info().
   *
   * @return array
   */
  public function tokenInfo();

  /**
   * @see hook_token_info_alter().
   *
   * @param array $data
   */
  public function tokenInfoAlter(&$data);

  /**
   * @see hook_tokens().
   *
   * @param string   $type
   * @param string[] $tokens
   * @param array    $data
   * @param array    $options
   *
   * @return array
   */
  public function tokens($type, $tokens, array $data = [], array $options = []);

  /**
   * @see hook_tokens_alter().
   *
   * @param array $replacements
   * @param array $context
   */
  public function tokensAlter(array &$replacements, array $context);
}

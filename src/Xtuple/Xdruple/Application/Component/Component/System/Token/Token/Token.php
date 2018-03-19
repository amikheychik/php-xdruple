<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token;

use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

interface Token {
  public function token(): string;

  public function name(): string;

  public function description(): string;

  /**
   * @param mixed|null    $data    - data of the required type; it's encouraged to rename the parameter in the children
   *                               classes, e.g. $node for node tokens
   * @param array         $context - all the data originally passed into token
   * @param null|Language $language
   * @param bool          $sanitize
   *
   * @return string
   */
  public function replace($data, array $context = [], ?Language $language = null, bool $sanitize = true): string;
}

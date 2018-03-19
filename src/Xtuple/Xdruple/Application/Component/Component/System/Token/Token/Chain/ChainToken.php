<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Chain;

use Xtuple\Xdruple\Application\Component\Component\System\Token\Token\Token;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;

interface ChainToken
  extends Token {
  /**
   * Type of the token itself. If type exists, token can be chained, e.g. [node:author:name], where author type is
   * 'user', so user token type tokens can be used.
   *
   * @return string
   */
  public function type(): string;

  /**
   * If type is not empty return data for the subtype token to be generated, so it can be chained. Only token itself
   * might know how to load or build this data. Taking example from type() method, author token must load user, using
   * data passed to it.
   *
   * @param mixed|null $data    - data of the required type; it's encouraged to rename the parameter in the children
   *                            classes, e.g. $node for node tokens
   * @param array      $context - all the data originally passed into token
   *
   * @return mixed
   */
  public function data($data, array $context = []);

  /**
   * For chained tokens, replace() method is a fallback, as results of data() should be used to generate them through
   * the appropriate type().
   *
   * {@inheritdoc}
   */
  public function replace($data, array $context = [], ?Language $language = null, bool $sanitize = true): string;
}

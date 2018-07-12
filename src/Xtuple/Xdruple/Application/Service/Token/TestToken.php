<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Token;

use Xtuple\Xdruple\Application\Component\Component\System\Token\Type\Collection\Map\MapType;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;
use Xtuple\Xdruple\Application\Service\Token\Message\Message;

final class TestToken
  implements Token {
  /** @var MapType */
  private $types;

  public function __construct(MapType $types) {
    $this->types = $types;
  }

  /**
   * @see token_replace()
   *
   * @param Message       $string
   * @param null|Language $language
   * @param bool          $clear
   * @param bool          $sanitize
   *
   * @return string
   */
  public function process(Message $string, ?Language $language = null, bool $clear = false,
                          bool $sanitize = true): string {
    if ($found = $this->scan($string->string())) {
      return strtr(
        $string->string(),
        $this->replacements($found, $string->data(), $language, $clear, $sanitize)
      );
    }
    return $string->string();
  }

  private function replacements(array $types, array $data, ?Language $language = null, bool $clear = false,
                                bool $sanitize = true): array {
    $replacements = [];
    foreach ($types as $type => $tokens) {
      if ($type = $this->types->get($type)) {
        foreach ($type->tokens() as $token) {
          if ($replace = ($tokens[$token->token()] ?? null)) {
            $replacements[$replace] = $token->replace(
              $type->type() ? ($data[$type->type()] ?? null) : null,
              $data,
              $language,
              $sanitize
            );
          }
        }
        foreach ($type->chained() as $token) {
          if ($compound = $this->compound($tokens, $token->token())) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $replacements = array_merge($replacements, $this->replacements([
              $token->type() => $compound,
            ], [
              $token->type() => $token->data($data[$type->type()] ?? null, $data),
            ], $language, $clear, $sanitize));
          }
        }
      }
      if ($clear) {
        $replacements += array_fill_keys($tokens, '');
      }
    }
    return $replacements;
  }

  private function compound(array $tokens, $prefix, $delimiter = ':') {
    $results = [];
    foreach ($tokens as $token => $raw) {
      $parts = explode($delimiter, $token, 2);
      if (count($parts) === 2
        && $parts[0] === $prefix) {
        $results[$parts[1]] = $raw;
      }
    }
    return $results;
  }

  /**
   * @see token_scan()
   *
   * @param string $text
   *
   * @return array
   */
  private function scan(string $text) {
    preg_match_all('/\[([^\s\[\]:]*):([^\[\]]*)\]/x', $text, $matches);
    [, $types, $tokens] = $matches;
    $results = [];
    $count = count($tokens);
    for ($i = 0; $i < $count; $i++) {
      $results[$types[$i]][$tokens[$i]] = $matches[0][$i];
    }
    return $results;
  }
}

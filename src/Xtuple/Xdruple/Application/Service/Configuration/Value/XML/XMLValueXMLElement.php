<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Configuration\Value\XML;

use Xtuple\Util\Exception\ChainException;
use Xtuple\Util\XML\Element\XMLElement;
use Xtuple\Util\XML\Element\XMLElementString;

final class XMLValueXMLElement
  extends AbstractXMLValue {
  /**
   * @throws ChainException
   *
   * @param XMLElement $element
   */
  public function __construct(XMLElement $element) {
    $default = set_error_handler(strtr('{this}::suppress', [
      '{this}' => self::class,
    ]));
    try {
      $value = null;
      if (preg_match("!<{$element->name()}(?:[^>]*)>(.*)</{$element->name()}>!Ums", (string) $element)) {
        $value = new XMLElementString(preg_replace(
          "!<{$element->name()}(?:[^>]*)>(.*)</{$element->name()}>!Ums",
          '$1',
          (string) $element
        ));
      }
      parent::__construct(new XMLValueStruct($value));
    }
    catch (\Throwable $e) {
      throw new ChainException($e, 'XML element {name} is not an XML value', [
        'name' => $element->name(),
      ]);
    }
    finally {
      set_error_handler($default);
    }
  }

  /**
   * @param int    $level
   * @param string $message
   * @param string $filename
   * @param int    $line
   */
  public static function suppress($level, $message, $filename, $line) {
  }
}

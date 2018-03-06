<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale\Language\StdClass;

use Xtuple\Xdruple\Application\Service\Locale\Language\AbstractLanguage;
use Xtuple\Xdruple\Application\Service\Locale\Language\Direction\LanguageDirection;
use Xtuple\Xdruple\Application\Service\Locale\Language\LanguageStruct;

final class LanguageStdClass
  extends AbstractLanguage {
  /**
   * @throws \Throwable
   *
   * @param \stdClass $language
   */
  public function __construct(\stdClass $language) {
    parent::__construct(new LanguageStruct(
      $language->language,
      $language->name,
      $language->native,
      new LanguageDirection($language->direction),
      (bool) $language->enabled,
      $language->plurals,
      $language->formula,
      $language->domain,
      $language->prefix,
      $language->weight,
      $language->javascript
    ));
  }
}

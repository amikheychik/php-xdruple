<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\Locale;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Locale API (https://api.drupal.org/api/drupal/modules!locale!locale.api.php/7)
 */
interface LocaleComponent
  extends Component {
  public const NAME = 'locale';

  /**
   * @see hook_locale().
   *
   * @param string $op
   *
   * @return array
   */
  public function locale($op);

  /**
   * @see hook_multilingual_settings_changed().
   */
  public function multilingualSettingsChanged();
}

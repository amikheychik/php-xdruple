<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\Countries;

use Xtuple\Xdruple\Application\Component\Component;

interface CountriesComponent
  extends Component {
  public const NAME = 'countries';

  /**
   * @see hook_countries_alter().
   *
   * @param array $countries
   */
  public function countriesAlter(&$countries);
}

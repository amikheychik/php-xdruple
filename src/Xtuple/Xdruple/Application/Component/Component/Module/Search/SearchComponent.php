<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\Search;

use Xtuple\Xdruple\Application\Component\Component;

interface SearchComponent
  extends Component {
  public const NAME = 'search';

  /**
   * @see hook_search_info().
   *
   * @return array
   */
  public function searchInfo();

  /**
   * @see hook_search_access().
   *
   * @return bool
   */
  public function searchAccess();

  /**
   * @see hook_search_admin().
   *
   * @return array
   */
  public function searchAdmin();

  /**
   * @see callback_search_conditions()
   *
   * @param $keys
   *
   * @return array
   */
  public function searchConditions($keys);

  /**
   * @see hook_search_execute().
   *
   * @param string|null $keys
   * @param array|null  $conditions
   *
   * @return array
   */
  public function searchExecute($keys = null, $conditions = null);

  /**
   * @see hook_search_page().
   *
   * @param array $results
   *
   * @return array
   */
  public function searchPage($results);

  /**
   * @see hook_search_preprocess().
   *
   * @param string $text
   *
   * @return string
   */
  public function searchPreprocess($text);

  /**
   * @see hook_search_reset().
   */
  public function searchReset();

  /**
   * @see hook_search_status().
   *
   * @return array
   */
  public function searchStatus();

  /**
   * @see hook_update_index().
   */
  public function updateIndex();
}

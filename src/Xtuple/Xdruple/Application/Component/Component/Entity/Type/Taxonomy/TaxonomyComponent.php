<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\Taxonomy;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see taxonomy.api.php (https://api.drupal.org/api/drupal/modules!taxonomy!taxonomy.api.php/7)
 */
interface TaxonomyComponent
  extends Component {
  public const NAME = 'taxonomy';

  /**
   * @see hook_taxonomy_vocabulary_presave().
   *
   * @param \stdClass $vocabulary
   */
  public function taxonomyVocabularyPresave($vocabulary);

  /**
   * @see hook_taxonomy_vocabulary_insert().
   *
   * @param \stdClass $vocabulary
   */
  public function taxonomyVocabularyInsert($vocabulary);

  /**
   * @see hook_taxonomy_vocabulary_update().
   *
   * @param \stdClass $vocabulary
   */
  public function taxonomyVocabularyUpdate($vocabulary);

  /**
   * @see hook_taxonomy_vocabulary_load().
   *
   * @param \stdClass[] $vocabularies
   */
  public function taxonomyVocabularyLoad($vocabularies);

  /**
   * @see hook_taxonomy_vocabulary_delete().
   *
   * @param \stdClass $vocabulary
   */
  public function taxonomyVocabularyDelete($vocabulary);

  /**
   * @see hook_taxonomy_term_presave().
   *
   * @param \stdClass $term
   */
  public function taxonomyTermPresave($term);

  /**
   * @see hook_taxonomy_term_insert().
   *
   * @param \stdClass $term
   */
  public function taxonomyTermInsert($term);

  /**
   * @see hook_taxonomy_term_update().
   *
   * @param \stdClass $term
   */
  public function taxonomyTermUpdate($term);

  /**
   * @see hook_taxonomy_term_load().
   *
   * @param \stdClass[] $terms
   */
  public function taxonomyTermLoad($terms);

  /**
   * @see hook_taxonomy_term_delete().
   *
   * @param \stdClass $term
   */
  public function taxonomyTermDelete($term);

  /**
   * @see hook_taxonomy_term_view().
   *
   * @param \stdClass $term
   * @param string    $viewMode
   * @param string    $langcode
   */
  public function taxonomyTermView($term, $viewMode, $langcode);

  /**
   * @see hook_taxonomy_term_view_alter().
   *
   * @param array $build
   */
  public function taxonomyTermViewAlter(&$build);
}

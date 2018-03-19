<?php declare(strict_types=1);

use Xtuple\Xdruple\Application\Component\Component\Entity\Type\Taxonomy\TaxonomyComponent;

/**
 * @workaround implements hook_forms() for taxonomy.module to support custom forms for each taxonomy term bundle.
 */
function taxonomy_forms() {
  $forms = [];
  if ($vocabularies = taxonomy_get_vocabularies()) {
    foreach ($vocabularies as $vocabulary) {
      $forms["taxonomy_form_term_{$vocabulary->machine_name}"]['callback'] = 'taxonomy_form_term';
    }
  }
  return $forms;
}

/**
 * Implements hook_taxonomy_term_presave().
 *
 * @param \stdClass $term
 */
function xdruple_taxonomy_term_presave($term) {
  _xdruple_application_taxonomy_component()->taxonomyTermPresave($term);
}

/**
 * Implements hook_taxonomy_term_insert().
 *
 * @param \stdClass $term
 */
function xdruple_taxonomy_term_insert($term) {
  _xdruple_application_taxonomy_component()->taxonomyTermInsert($term);
}

/**
 * Implements hook_taxonomy_term_update().
 *
 * @param \stdClass $term
 */
function xdruple_taxonomy_term_update($term) {
  _xdruple_application_taxonomy_component()->taxonomyTermUpdate($term);
}

/**
 * Implements hook_taxonomy_term_load().
 *
 * @param \stdClass[] $terms
 */
function xdruple_taxonomy_term_load($terms) {
  _xdruple_application_taxonomy_component()->taxonomyTermLoad($terms);
}

/**
 * Implements hook_taxonomy_term_delete().
 *
 * @param \stdClass $term
 */
function xdruple_taxonomy_term_delete($term) {
  _xdruple_application_taxonomy_component()->taxonomyTermDelete($term);
}

/**
 * Implements hook_taxonomy_term_view().
 *
 * @param \stdClass $term
 * @param string    $view_mode
 * @param string    $langcode
 */
function xdruple_taxonomy_term_view($term, $view_mode, $langcode) {
  _xdruple_application_taxonomy_component()->taxonomyTermView($term, $view_mode, $langcode);
}

/**
 * Implements hook_taxonomy_term_view_alter().
 *
 * @param array $build
 */
function xdruple_taxonomy_term_view_alter(&$build) {
  _xdruple_application_taxonomy_component()->taxonomyTermViewAlter($build);
}

/**
 * Implements hook_taxonomy_vocabulary_presave().
 *
 * @param \stdClass $vocabulary
 */
function xdruple_taxonomy_vocabulary_presave($vocabulary) {
  _xdruple_application_taxonomy_component()->taxonomyVocabularyPresave($vocabulary);
}

/**
 * Implements hook_taxonomy_vocabulary_insert().
 *
 * @param \stdClass $vocabulary
 */
function xdruple_taxonomy_vocabulary_insert($vocabulary) {
  _xdruple_application_taxonomy_component()->taxonomyVocabularyInsert($vocabulary);
}

/**
 * Implements hook_taxonomy_vocabulary_update().
 *
 * @param \stdClass $vocabulary
 */
function xdruple_taxonomy_vocabulary_update($vocabulary) {
  _xdruple_application_taxonomy_component()->taxonomyVocabularyUpdate($vocabulary);
}

/**
 * Implements hook_taxonomy_vocabulary_load().
 *
 * @param \stdClass[] $vocabularies
 */
function xdruple_taxonomy_vocabulary_load($vocabularies) {
  _xdruple_application_taxonomy_component()->taxonomyVocabularyLoad($vocabularies);
}

/**
 * Implements hook_taxonomy_vocabulary_delete().
 *
 * @param \stdClass $vocabulary
 */
function xdruple_taxonomy_vocabulary_delete($vocabulary) {
  _xdruple_application_taxonomy_component()->taxonomyVocabularyDelete($vocabulary);
}

function _xdruple_application_taxonomy_component(): TaxonomyComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(TaxonomyComponent::NAME);
  /** @var TaxonomyComponent $component */
  return $component;
}

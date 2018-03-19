<?php declare(strict_types=1);

/**
 * @file keeps Comment API (https://api.drupal.org/api/drupal/modules!comment!comment.api.php/7) hooks implementations
 */

use Xtuple\Xdruple\Application\Component\Component\Entity\Type\Comment\CommentComponent;

/**
 * Implements hook_comment_presave().
 *
 * @param \stdClass $comment
 */
function xdruple_comment_presave($comment) {
  _xdruple_application_comment_component()->commentPresave($comment);
}

/**
 * Implements hook_comment_insert().
 *
 * @param \stdClass $comment
 */
function xdruple_comment_insert($comment) {
  _xdruple_application_comment_component()->commentInsert($comment);
}

/**
 * Implements hook_comment_publish().
 *
 * @param \stdClass $comment
 */
function xdruple_comment_publish($comment) {
  _xdruple_application_comment_component()->commentPublish($comment);
}

/**
 * Implements hook_comment_update().
 *
 * @param \stdClass $comment
 */
function xdruple_comment_update($comment) {
  _xdruple_application_comment_component()->commentUpdate($comment);
}

/**
 * Implements hook_comment_unpublish().
 *
 * @param \stdClass $comment
 */
function xdruple_comment_unpublish($comment) {
  _xdruple_application_comment_component()->commentUnpublish($comment);
}

/**
 * Implements hook_comment_load().
 *
 * @param \stdClass[] $comments
 */
function xdruple_comment_load($comments) {
  _xdruple_application_comment_component()->commentLoad($comments);
}

/**
 * Implements hook_comment_delete().
 *
 * @param \stdClass $comment
 */
function xdruple_comment_delete($comment) {
  _xdruple_application_comment_component()->commentDelete($comment);
}

/**
 * Implements hook_comment_view().
 *
 * @param \stdClass $comment
 * @param string    $view_mode
 * @param string    $langcode
 */
function xdruple_comment_view($comment, $view_mode, $langcode) {
  _xdruple_application_comment_component()->commentView($comment, $view_mode, $langcode);
}

/**
 * Implements hook_comment_view_alter().
 *
 * @param array $build
 */
function xdruple_comment_view_alter(&$build) {
  _xdruple_application_comment_component()->commentViewAlter($build);
}

function _xdruple_application_comment_component(): CommentComponent {
  /** @noinspection PhpUnhandledExceptionInspection */
  $component = xdruple_application()->component(CommentComponent::NAME);
  /** @var CommentComponent $component */
  return $component;
}

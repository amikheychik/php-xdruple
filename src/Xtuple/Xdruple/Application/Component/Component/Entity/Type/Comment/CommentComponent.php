<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\Comment;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Comment API (https://api.drupal.org/api/drupal/modules!comment!comment.api.php/7)
 */
interface CommentComponent
  extends Component {
  public const NAME = 'comment';

  /**
   * @see hook_comment_presave().
   *
   * @param \stdClass $comment
   */
  public function commentPresave($comment);

  /**
   * @see hook_comment_insert().
   *
   * @param \stdClass $comment
   */
  public function commentInsert($comment);

  /**
   * @see hook_comment_publish().
   *
   * @param \stdClass $comment
   */
  public function commentPublish($comment);

  /**
   * @see hook_comment_load().
   *
   * @param \stdClass[] $comments
   */
  public function commentLoad($comments);

  /**
   * @see hook_comment_update().
   *
   * @param \stdClass $comment
   */
  public function commentUpdate($comment);

  /**
   * @see hook_comment_unpublish().
   *
   * @param \stdClass $comment
   */
  public function commentUnpublish($comment);

  /**
   * @see hook_comment_delete().
   *
   * @param \stdClass $comment
   */
  public function commentDelete($comment);

  /**
   * @see hook_comment_view().
   *
   * @param \stdClass $comment
   * @param string    $viewMode
   * @param string    $langcode
   */
  public function commentView($comment, $viewMode, $langcode);

  /**
   * @see hook_comment_view_alter().
   *
   * @param array $build
   */
  public function commentViewAlter(&$build);
}

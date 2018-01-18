<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Entity\Type\Node;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Node API Hooks (https://api.drupal.org/api/drupal/modules!node!node.api.php/group/node_api_hooks/7)
 * @see node.api.php (https://api.drupal.org/api/drupal/modules!node!node.api.php/7)
 */
interface NodeComponent
  extends Component {
  public const NAME = 'node';

  /**
   * @see hook_node_info().
   *
   * @return array
   */
  public function nodeInfo();

  /**
   * @see hook_entity_info()
   * @see node_uri()
   *
   * @param $node
   *
   * @return array
   */
  public function nodeUri($node);

  /**
   * @see hook_node_type_insert().
   *
   * @param $info
   */
  public function nodeTypeInsert($info);

  /**
   * @see hook_node_type_update().
   *
   * @param $info
   */
  public function nodeTypeUpdate($info);

  /**
   * @see hook_node_type_delete().
   *
   * @param $info
   */
  public function nodeTypeDelete($info);

  /**
   * @see hook_prepare().
   *
   * @param $node
   */
  public function prepare($node);

  /**
   * @see hook_form().
   *
   * @param $node
   * @param $formState
   *
   * @return array
   */
  public function form($node, &$formState);

  /**
   * @see hook_validate().
   *
   * @param $node
   * @param $form
   * @param $formState
   */
  public function validate($node, $form, &$formState);

  /**
   * @see hook_insert().
   *
   * @param $node
   */
  public function insert($node);

  /**
   * @see hook_update().
   *
   * @param $node
   */
  public function update($node);

  /**
   * @see hook_load().
   *
   * @param $nodes
   */
  public function load($nodes);

  /**
   * @see hook_view().
   *
   * @param $node
   * @param $viewMode
   * @param $langcode
   *
   * @return \stdClass
   */
  public function view($node, $viewMode, $langcode);

  /**
   * @see hook_delete().
   *
   * @param $node
   */
  public function delete($node);

  /**
   * @see hook_node_prepare().
   *
   * @param $node
   */
  public function nodePrepare($node);

  /**
   * @see hook_node_validate().
   *
   * @param $node
   * @param $form
   * @param $formState
   */
  public function nodeValidate($node, $form, &$formState);

  /**
   * @see hook_node_submit().
   *
   * @param $node
   * @param $form
   * @param $formState
   */
  public function nodeSubmit($node, $form, &$formState);

  /**
   * @see hook_node_presave().
   *
   * @param $node
   */
  public function nodePresave($node);

  /**
   * @see hook_node_insert().
   *
   * @param $node
   */
  public function nodeInsert($node);

  /**
   * @see hook_node_update().
   *
   * @param $node
   */
  public function nodeUpdate($node);

  /**
   * @see hook_node_load().
   *
   * @param $nodes
   * @param $types
   */
  public function nodeLoad($nodes, $types);

  /**
   * @see hook_node_view().
   *
   * @param $node
   * @param $viewMode
   * @param $langcode
   */
  public function nodeView($node, $viewMode, $langcode);

  /**
   * @see hook_node_view_alter().
   *
   * @param $build
   */
  public function nodeViewAlter(&$build);

  /**
   * @see hook_node_revision_delete().
   *
   * @param $node
   */
  public function nodeRevisionDelete($node);

  /**
   * @see hook_node_delete().
   *
   * @param $node
   */
  public function nodeDelete($node);

  /**
   * @see hook_node_access().
   *
   * @param $node
   * @param $op
   * @param $account
   *
   * @return string
   */
  public function nodeAccess($node, $op, $account);

  /**
   * @see hook_node_access_records().
   *
   * @param $node
   *
   * @return array
   */
  public function nodeAccessRecords($node);

  /**
   * @see hook_node_access_records_alter().
   *
   * @param $grants
   * @param $node
   */
  public function nodeAccessRecordsAlter(&$grants, $node);

  /**
   * @see hook_node_grants().
   *
   * @param $account
   * @param $op
   *
   * @return array
   */
  public function nodeGrants($account, $op);

  /**
   * @see hook_node_grants_alter().
   *
   * @param $grants
   * @param $account
   * @param $op
   */
  public function nodeGrantsAlter(&$grants, $account, $op);

  /**
   * @see hook_node_operations().
   *
   * @return array
   */
  public function nodeOperations();

  /**
   * @see hook_ranking().
   *
   * @return array
   */
  public function ranking();

  /**
   * @see hook_node_update_index().
   *
   * @param $node
   *
   * @return string
   */
  public function nodeUpdateIndex($node);

  /**
   * @see hook_node_search_result().
   *
   * @param $node
   *
   * @return array
   */
  public function nodeSearchResult($node);
}

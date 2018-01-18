<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\File\Download;

use Xtuple\Xdruple\Application\Component\Component;

interface FileDownloadComponent
  extends Component {
  public const NAME = 'file_download';

  /**
   * @see hook_file_download_access().
   *
   * @param array     $fileItem
   * @param string    $entityType
   * @param \stdClass $entity
   *
   * @return bool
   */
  public function fileDownloadAccess($fileItem, $entityType, $entity);

  /**
   * @see hook_file_download_access_alter().
   *
   * @param array     $grants
   * @param array     $fileItem
   * @param string    $entityType
   * @param \stdClass $entity
   */
  public function fileDownloadAccessAlter(&$grants, $fileItem, $entityType, $entity);
}

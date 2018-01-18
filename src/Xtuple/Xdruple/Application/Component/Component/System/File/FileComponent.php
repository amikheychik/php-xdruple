<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\System\File;

use Xtuple\Xdruple\Application\Component\Component;

interface FileComponent
  extends Component {
  public const NAME = 'file';

  /**
   * @see hook_file_copy()
   *
   * @param \stdClass $file
   * @param \stdClass $source
   */
  public function fileCopy($file, $source);

  /**
   * @see hook_file_delete()
   *
   * @param \stdClass $file
   */
  public function fileDelete($file);

  /**
   * @see    hook_file_download()
   *
   * @param string $uri
   *
   * @return int|array|null (-1 - If the user does not have permission to access the file)
   */
  public function fileDownload($uri);

  /**
   * @see hook_file_insert()
   *
   * @param \stdClass $file
   */
  public function fileInsert($file);

  /**
   * @see hook_file_load()
   *
   * @param \stdClass[] $files
   */
  public function fileLoad($files);

  /**
   * @see hook_file_mimetype_mapping_alter()
   *
   * @param array $mapping
   */
  public function fileMimetypeMappingAlter(&$mapping);

  /**
   * @see hook_file_move()
   *
   * @param \stdClass $file
   * @param \stdClass $source
   */
  public function fileMove($file, $source);

  /**
   * @see hook_file_presave()
   *
   * @param \stdClass $file
   */
  public function filePresave($file);

  /**
   * @see hook_file_update()
   *
   * @param \stdClass $file
   */
  public function fileUpdate($file);

  /**
   * @see hook_file_url_alter()
   *
   * @param string $uri
   */
  public function fileUrlAlter(&$uri);

  /**
   * @see hook_file_validate()
   *
   * @param \stdClass $file
   *
   * @return string[]
   */
  public function fileValidate($file);
}

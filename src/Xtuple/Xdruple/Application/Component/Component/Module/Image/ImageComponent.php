<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Module\Image;

use Xtuple\Xdruple\Application\Component\Component;

/**
 * @see Image API (https://api.drupal.org/api/drupal/modules!image!image.api.php/7)
 */
interface ImageComponent
  extends Component {
  public const NAME = 'image';

  /**
   * @see hook_image_effect_info().
   *
   * @return array
   */
  public function imageEffectInfo();

  /**
   * @see hook_image_effect_info_alter().
   *
   * @param array $effects
   */
  public function imageEffectInfoAlter(&$effects);

  /**
   * @see hook_image_default_styles().
   *
   * @return array
   */
  public function imageDefaultStyles();

  /**
   * @see hook_image_styles_alter().
   *
   * @param array $styles
   */
  public function imageStylesAlter(&$styles);

  /**
   * @see hook_image_style_save().
   *
   * @param array $style
   */
  public function imageStyleSave($style);

  /**
   * @see hook_image_style_delete().
   *
   * @param array $style
   */
  public function imageStyleDelete($style);

  /**
   * @see hook_image_style_flush().
   *
   * @param array $style
   */
  public function imageStyleFlush($style);
}

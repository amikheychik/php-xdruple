<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\Features;

final class WebformComponentFeaturesStruct
  implements WebformComponentFeatures {
  /** @var bool */
  private $analysis;
  /** @var bool */
  private $csv;
  /** @var bool */
  private $defaultValue;
  /** @var bool */
  private $description;
  /** @var bool */
  private $email;
  /** @var bool */
  private $emailAddress;
  /** @var bool */
  private $emailName;
  /** @var bool */
  private $required;
  /** @var bool */
  private $title;
  /** @var bool */
  private $titleDisplay;
  /** @var bool */
  private $titleInline;
  /** @var bool */
  private $conditional;
  /** @var bool */
  private $group;
  /** @var bool */
  private $spamAnalysis;
  /** @var bool */
  private $attachment;
  /** @var bool */
  private $viewsRange;
  /** @var bool */
  private $canBePrivate;
  /** @var bool */
  private $placeholder;
  /** @var bool */
  private $wrapperClasses;
  /** @var bool */
  private $cssClasses;

  /**
   * @param bool $analysis     - component includes an analysis callback.
   * @param bool $csv          - add content to CSV downloads
   * @param bool $defaultValue - component supports default values
   * @param bool $description  - component supports a description field
   * @param bool $email        - show this component in e-mailed submissions
   * @param bool $emailAddress - allow this component to be used as an e-mail FROM or TO address
   * @param bool $emailName    - allow this component to be used as an e-mail SUBJECT or FROM name
   * @param bool $required     - component may be toggled as required or not
   * @param bool $title        - component supports a title attribute
   * @param bool $titleDisplay - component has a title that can be toggled as displayed or not
   * @param bool $titleInline  - component has a title that can be displayed inline
   * @param bool $conditional  - component can be used as a conditional SOURCE. All components may always be displayed
   *                           conditionally, regardless of this setting
   * @param bool $group        - component allows other components to be grouped within it (like a fieldset or tabs)
   * @param bool $spamAnalysis - component can be used for SPAM analysis, usually with Mollom
   * @param bool $attachment   - component saves a file that can be used as an e-mail attachment
   * @param bool $viewsRange   - component reflects a time range and should use labels such as "Before" and "After" when
   *                           exposed as filters in Views module
   * @param bool $canBePrivate
   * @param bool $placeholder
   * @param bool $wrapperClasses
   * @param bool $cssClasses
   */
  public function __construct(bool $analysis = true, bool $csv = true, bool $defaultValue = true,
                              bool $description = true, bool $email = true, bool $emailAddress = false,
                              bool $emailName = false, bool $required = true, bool $title = true,
                              bool $titleDisplay = true, bool $titleInline = true, bool $conditional = true,
                              bool $group = false, bool $spamAnalysis = false, bool $attachment = false,
                              bool $viewsRange = false, bool $canBePrivate = true, bool $placeholder = false,
                              bool $wrapperClasses = true, bool $cssClasses = true) {
    $this->analysis = $analysis;
    $this->csv = $csv;
    $this->defaultValue = $defaultValue;
    $this->description = $description;
    $this->email = $email;
    $this->emailAddress = $emailAddress;
    $this->emailName = $emailName;
    $this->required = $required;
    $this->title = $title;
    $this->titleDisplay = $titleDisplay;
    $this->titleInline = $titleInline;
    $this->conditional = $conditional;
    $this->group = $group;
    $this->spamAnalysis = $spamAnalysis;
    $this->attachment = $attachment;
    $this->viewsRange = $viewsRange;
    $this->canBePrivate = $canBePrivate;
    $this->placeholder = $placeholder;
    $this->wrapperClasses = $wrapperClasses;
    $this->cssClasses = $cssClasses;
  }

  public function analysis(): bool {
    return $this->analysis;
  }

  public function csv(): bool {
    return $this->csv;
  }

  public function defaultValue(): bool {
    return $this->defaultValue;
  }

  public function description(): bool {
    return $this->description;
  }

  public function email(): bool {
    return $this->email;
  }

  public function emailAddress(): bool {
    return $this->emailAddress;
  }

  public function emailName(): bool {
    return $this->emailName;
  }

  public function required(): bool {
    return $this->required;
  }

  public function title(): bool {
    return $this->title;
  }

  public function titleDisplay(): bool {
    return $this->titleDisplay;
  }

  public function titleInline(): bool {
    return $this->titleInline;
  }

  public function conditional(): bool {
    return $this->conditional;
  }

  public function group(): bool {
    return $this->group;
  }

  public function spamAnalysis(): bool {
    return $this->spamAnalysis;
  }

  public function attachment(): bool {
    return $this->attachment;
  }

  public function viewsRange(): bool {
    return $this->viewsRange;
  }

  public function canBePrivate(): bool {
    return $this->canBePrivate;
  }

  public function placeholder(): bool {
    return $this->placeholder;
  }

  public function wrapperClasses(): bool {
    return $this->wrapperClasses;
  }

  public function cssClasses(): bool {
    return $this->cssClasses;
  }
}

<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Component\Component\Webform\Component\Component\Info\Features;

interface WebformComponentFeatures {
  public function analysis(): bool;

  public function csv(): bool;

  public function defaultValue(): bool;

  public function description(): bool;

  public function email(): bool;

  public function emailAddress(): bool;

  public function emailName(): bool;

  public function required(): bool;

  public function title(): bool;

  public function titleDisplay(): bool;

  public function titleInline(): bool;

  public function conditional(): bool;

  public function group(): bool;

  public function spamAnalysis(): bool;

  public function attachment(): bool;

  public function viewsRange(): bool;

  public function canBePrivate(): bool;

  public function placeholder(): bool;

  public function wrapperClasses(): bool;

  public function cssClasses(): bool;
}

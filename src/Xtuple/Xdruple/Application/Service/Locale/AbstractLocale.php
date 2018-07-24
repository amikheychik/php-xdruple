<?php declare(strict_types=1);

namespace Xtuple\Xdruple\Application\Service\Locale;

use Xtuple\Util\Type\String\Message\Message\Message;
use Xtuple\Util\Type\String\Message\Type\Number\Currency\CurrencyMessage;
use Xtuple\Util\Type\String\Message\Type\Number\Currency\CurrencyMessageWithPrecision;
use Xtuple\Util\Type\String\Message\Type\Number\NumberMessage;
use Xtuple\Util\Type\String\Message\Type\Plural\PluralMessage;
use Xtuple\Xdruple\Application\Service\Locale\Currency\Precision\CurrencyPrecision;
use Xtuple\Xdruple\Application\Service\Locale\Drupal\DrupalLocaleFunctions;
use Xtuple\Xdruple\Application\Service\Locale\Language\Language;
use Xtuple\Xdruple\Application\Service\Locale\Message\DrupalArgumentKey;
use Xtuple\Xdruple\Application\Service\Locale\Message\DrupalMessage;
use Xtuple\Xdruple\Application\Service\Locale\Message\DrupalPluralMessage;

abstract class AbstractLocale
  implements Locale {
  /** @var string */
  private $locale;
  /** @var DrupalLocaleFunctions */
  private $drupal;
  /** @var CurrencyPrecision */
  private $precision;

  public function __construct(DrupalLocaleFunctions $drupal, string $locale, CurrencyPrecision $precision) {
    $this->drupal = $drupal;
    $this->locale = $locale;
    $this->precision = $precision;
  }

  public final function t(string $string, ?Language $to = null): string {
    return $this->drupal->t($string, [], array_filter([
      'langcode' => $to ? $to->language() : null,
    ]));
  }

  public final function translate(Message $message, ?Language $to = null): string {
    $arguments = [];
    $message = new DrupalMessage($message);
    foreach ($message->arguments() as $argument) {
      $key = (string) new DrupalArgumentKey($argument);
      if ($argument instanceof PluralMessage) {
        /** @var PluralMessage $argument */
        $arguments[$key] = $this->plural($argument, $to);
      }
      elseif ($argument instanceof NumberMessage) {
        /** @var NumberMessage $argument */
        $arguments[$key] = $this->number($argument, $to);
      }
      elseif ($argument->arguments()->isEmpty()) {
        $arguments[$key] = $this->t((string) $argument, $to);
      }
      else {
        $arguments[$key] = $this->translate($argument, $to);
      }
    }
    return $this->drupal->t($message->template(), $arguments, array_filter([
      'langcode' => $to ? $to->language() : null,
    ]));
  }

  public final function plural(PluralMessage $string, ?Language $to = null): string {
    $plural = new DrupalPluralMessage($string);
    $arguments = [];
    foreach ($plural->arguments() as $argument) {
      $key = (string) new DrupalArgumentKey($argument);
      $arguments[$key] = $this->translate($argument, $to);
    }
    return $this->drupal->formatPlural(
      $plural->count()->template(),
      $plural->singular()->template(),
      $plural->plural()->template(),
      $arguments,
      array_filter([
        'langcode' => $to ? $to->language() : null,
      ])
    );
  }

  public final function number(NumberMessage $number, ?Language $to = null): string {
    $locale = $to
      ? \Locale::canonicalize($to->language())
      : $this->locale;
    if ($number instanceof CurrencyMessage
      && $this->precision->precision()) {
      /** @var CurrencyMessage $number */
      return (new CurrencyMessageWithPrecision(
        $number->amount(),
        $number->currency(),
        $this->precision->precision()
      ))->format($locale);
    }
    return $number->format($locale);
  }
}

<?php

namespace Drupal\custom;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Prepares Salutation to the world.
 */

Class HelloWorldSalutation {
  use StringTranslationTrait;

  /**
   * Returns the Salutation
   */

  public function getSalutation() {
    $time = new \Datetime();
    if ((int) $time->format('G') >= 0 && (int) $time->format('G') <12) {
      return $this->t('Good morning!');
    }

    if ((int) $time->format('G') > 12 && (int) $time->format('G') <= 18) {
      return $this->t('Good afternoon');
    }

    if ((int) $time->format('G') > 18) {
      return $this->t('Good evening');
    }
  }
}
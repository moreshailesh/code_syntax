<?php

namespace Drupal\custom;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Prepares Salutation to the world.
 */

Class HelloWorldSalutation {
  use StringTranslationTrait;

  /**
   * @var Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * HelloWorldSalutation Constructor
   * 
   * @param Drupal\Core\Config\ConfigFactoryInterface $config_factory
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }
  /**
   * Returns the Salutation
   */

  public function getSalutation() {
    $config = $this->configFactory->get('custom.custom_salutation');
    $salutation = $config->get('salutation');
    if ($salutation !== '' && $salutation) {
      return $salutation;
    }

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
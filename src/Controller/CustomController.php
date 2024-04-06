<?php

namespace Drupal\custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\custom\HelloWorldSalutation;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Returns responses for custom routes.
 */
class CustomController extends ControllerBase {

  /**
   * Builds the response.
   */
  /* public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ]; 

    //return $build; 
     $user =  User::load(\Drupal::currentUser()->id());
    $user_id =  $user->id();
    $roles =  $user->getRoles();
    $roles = implode(',', $roles);
    return  [
      '#type' => 'item',
      '#markup' => $roles,
    ]; 
  } */

  /**
   * @var Drupal\custom\HelloWorldSalutation
   */
  protected $salutation;

  /**
   * Customcontroller constructor
   * 
   * @param Drupal\custom\HelloWorldSalutation $salutation
   */
  public function __construct(HelloWorldSalutation $salutation) {
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('custom.salutation')
      );
    
  }

  public function build() {
    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }
}

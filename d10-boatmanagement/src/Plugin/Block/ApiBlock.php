<?php

namespace Drupal\boatmanagement\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'APIBlock' block.
 *
 * @Block(
 *  id = "api_block",
 *  admin_label = @Translation("API block"),
 * )
 */
class APIBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;
  /**
   * Symfony\Component\HttpFoundation\RequestStack definition.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;
  /**
   * Constructs a new CalculAireBlock object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    EntityTypeManagerInterface $entity_type_manager,
	RequestStack $request_stack
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
    $this->requestStack = $request_stack;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('request_stack')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function build() {

    $client = new \GuzzleHttp\Client(); // Drupal::service('http_client')
    // Appel à l'API pour obtenir le code insee
    // $node = $this->requestStack->getCurrentRequest()->attributes->get('node');
    // $port_id = $node->get('field_port_d_attache')->referencedEntities();
    // $code_postal = $port_id[0]->get('field_code_postal')->getValue()[0]['value'];

    $config = \Drupal::config('configapi.configapi.test3');
    $url = $config->get('url');
    
    $response = $client->request('GET','https://geo.api.gouv.fr/communes?codePostal='.$code_postal);
    $content = $response->getBody()->getContents();
    $code_insee = $content->code;

    // Appel à l'API méteo
    $client2 = new \GuzzleHttp\Client();

    $response2 = $client2->request('GET','https://api.meteo-concept.com/api/ephemeride/1?insee='.$code_insee, [
        'headers'=> [
            "X-AUTH-TOKEN" =>  "09c3a5cd6afc91a28030ba1c55bb9da181b525ae96109e5caf9c1fe11bf5e2c4",
            "Accept" =>  "application/json"
        ]
    ]);

    $content = json_decode($response2->getBody()->getContents());
    
    $build = [];
      $build['api_block']['#markup'] = 'Le code insee du port est :'.$code_insee;
    return $build;
  }

  public function getCacheTags() {
    //With this when your node change your block will rebuild
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      //if there is node add its cachetag
      return Cache::mergeTags(parent::getCacheTags(), array('node:' . $node->id()));
    } else {
      //Return default tags instead.
      return parent::getCacheTags();
    }
  }

  public function getCacheContexts() {
    //if you depends on \Drupal::routeMatch()
    //you must set context of this block with 'route' context tag.
    //Every new route this block will rebuild
    return Cache::mergeContexts(parent::getCacheContexts(), array('route'));
  }
	
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'administer demo_module_boat configuration');
  }

}

<?php

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class DemoController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function mapage() {
    $client = new \GuzzleHttp\Client();
    // Appel à l'API de Drupal (après avoir activer REST, JSON API, et configurer Node pour etre accessible en webservice)
    // $response = $client->request('GET', 'https://my-drupal10-site.ddev.site/node/1?_format=json');

    // Appel à l'API méteo
    $response = $client->request('GET','https://api.meteo-concept.com/api/ephemeride/1?insee=35238', [
        'headers'=> [
            "X-AUTH-TOKEN" =>  "09c3a5cd6afc91a28030ba1c55bb9da181b525ae96109e5caf9c1fe11bf5e2c4",
            "Accept" =>  "application/json"
        ]
    ]);

    $content = json_decode($response->getBody()->getContents());

    $build = [
      '#markup' => "Code insee = " . $content->city->insee,
    ];
    return $build;
  }

  public function demoservice(){
    $monservice = \Drupal::service('demo_monservice');
    $build = [
      '#markup' => "path = " . $monservice->demo(),
    ];
    return $build;
  }

  public function demoplugin(){
    $type = \Drupal::service('demo.plugin.manager.formation');
    $plugin = $type->createInstance('visio');
    $build = [
      '#markup' => $plugin->slogan(),
    ];
    return $build;
  }

}

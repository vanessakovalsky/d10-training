<?php

// namespace Drupal\demo;

// use Drupal\Core\DependencyInjection\ContainerBuilder;
// use Drupal\Core\DependencyInjection\ServiceProviderBase;
// use Symfony\Component\DependencyInjection\Reference;

// class DemoServiceProvider extends ServiceProviderBase {

//     public function alter(ContainerBuilder $container){
//         $definition = $container->getDefinition('http_client');
//         $definition->setClass('Drupal\demo\Service\MonClientAPIService');
//         $definition->setArguments([
//             new Reference('http_client_factory')
//             // new Reference('fromOptions')
//         ]);
//     }


// }
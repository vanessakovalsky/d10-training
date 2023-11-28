<?php

namespace Drupal\boatmanagement\Service;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\boatmanagement\Event\ContactProprietaireEvent;

class ContactObserverService implements EventSubscriberInterface {
    public static function getSubscribedEvents(){
        $events[ContactProprietaireEvent::NAME] = ['contact'];
        return $events;
    }

    public function contact(){
        die(var_dump('arrive dans la méthode contact de l\'observer'));
    }
}
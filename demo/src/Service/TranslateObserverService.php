<?php


namespace Drupal\demo\Service;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\locale\LocaleEvents;

class TranslateObserverService implements EventSubscriberInterface {
    public static function getSubscribedEvents(){
        $events[LocaleEvents::SAVE_TRANSLATION] = ['showTranslate'];
        return $events;
    }

    public function showTranslate(){
        die(var_dump('arrive dans le showTranslate'));
    }
}
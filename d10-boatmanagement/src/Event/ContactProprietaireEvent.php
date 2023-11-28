<?php


namespace Drupal\boatmanagement\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ContactProprietaireEvent extends Event{

    public const NAME = 'contact.proprietaire';

    public $proprietaire_name;

    public function __construct($name){
        $this->proprietaire_name = $name;
    }
}
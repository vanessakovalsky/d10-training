<?php

namespace Drupal\demo\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class Monservice {

    protected RequestStack $request;

    public function __construct(RequestStack $request_stack){
        $this->request  = $request_stack;
    }

    public function demo(){
        return $this->request->getMainRequest()->attributes->get('_route');
    }
}
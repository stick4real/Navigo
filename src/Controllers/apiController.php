<?php

namespace Controllers;

class apiController {

    public function __construct($app){
        $this->validateAction($app);
    }

    public function validateAction($app){
        return true;
        //TODO
        // If post[user] is in db and user.card is in db
        // check if card has already been validate
        // if not then true else false
    }
}
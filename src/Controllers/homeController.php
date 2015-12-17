<?php

namespace Controllers;

class homeController {

    public function __construct($app){
        $this->uploadUsersAction($app);
    }

    public function homeAction(){
        return "hello world";
    }

    public function uploadUsersAction($app){
        // $handle = @fopen("../../users.lst", "r");
        // $values='';

        // $file = fopen('../users.lst', 'r');
        // $sql = "LOAD DATA LOCAL INFILE '../../users.lst'
        //        INTO TABLE users
        //        LINES TERMINATED BY '\n' 
        //        IGNORE 1 LINES;";

        // var_dump($app['db']);

        // $app['db']->executeQuery($sql);

    }
}
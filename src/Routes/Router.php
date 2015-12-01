<?php 

namespace src\Routes;

use Controllers\homeController as homeController;

Class Router {
    public function __construct($app){

        $this->homeRoutes($app);
    }

    public function homeRoutes($app){
        $homeController = new homeController();

        $app->get('/', [$homeController,'homeAction']);
    }
}
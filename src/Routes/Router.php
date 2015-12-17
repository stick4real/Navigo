<?php 

namespace src\Routes;

use Controllers\homeController as homeController;
use Controllers\userController as userController;
use Controllers\apiController as apiController;

Class Router {
    public function __construct($app){

        $this->homeRoutes($app);
        $this->userRoutes($app);
        $this->apiRoutes($app);
    }

    public function homeRoutes($app){
        $homeController = new homeController($app);

        $app->get('/', [$homeController,'homeAction']);
        $app->get('/uploadUsers', [$homeController, 'uploadUsersAction']);
    }

    public function userRoutes($app){
        $userController = new userController($app);

        $app->get('/user', [$userController,'testAction']);
    }

    public function apiRoutes($app){
        $apiController = new apiController($app);

        $app->post('/validate', [$apiController, 'validateAction']);
    }
}
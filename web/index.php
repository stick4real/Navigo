<?php

require_once __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/../src/Routes/Router.php';

use Silex\Provider;

$app = new Silex\Application();
$app['debug'] = true;
 
$app->register(new Provider\SecurityServiceProvider());

$app->register(new Provider\DoctrineServiceProvider());
 
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'Navigo',
    'user'     => 'root',
    'password' => 'root',
);

$simpleUserProvider = new SimpleUser\UserServiceProvider();
$app->register($simpleUserProvider);

$app->register(new Provider\SecurityServiceProvider());
 
$app['security.firewalls'] = array(
    'secured_area' => array(
        'users' => $app->share(function($app) { return $app['user.manager']; }),
    ),
);

$app->register(new Provider\RememberMeServiceProvider());
$app->register(new Provider\SessionServiceProvider());
$app->register(new Provider\ServiceControllerServiceProvider());
$app->register(new Provider\UrlGeneratorServiceProvider());
$app->register(new Provider\TwigServiceProvider());
$app->register(new Provider\SwiftmailerServiceProvider());

$userServiceProvider = new SimpleUser\UserServiceProvider();
$app->register($userServiceProvider);
 
// Mount SimpleUser routes.
$app->mount('/user', $userServiceProvider);

$app['security.firewalls'] = array(
    'secured_area' => array(
        'pattern' => '^.*$',
        'anonymous' => true,
        'remember_me' => array(),
        'form' => array(
            'login_path' => '/user/login',
            'check_path' => '/user/login_check',
        ),
        'logout' => array(
            'logout_path' => '/user/logout',
        ),
        'users' => $app->share(function($app) { return $app['user.manager']; }),
    ),
);

new src\Routes\Router($app);

// $app->get('/images', function () use ($app) {
//     header('Content-type: image/jpeg');
//     $templateFile = "http://static.hitek.fr/img/actualite/2015/09/01/googlelogosept12015.png";
//     $userPhoto = "http://www.argo.fr/wp-content/uploads/2013/04/profil2.jpg";

//     $im = new Imagick($templateFile);
//     $photo = new Imagick($userPhoto);
//     $photo->cropImage(50, 50, 50, 50);
//     $im->compositeImage($photo, Imagick::COMPOSITE_OVER, 50, 50);
//     echo $im;
// });

$app->run();
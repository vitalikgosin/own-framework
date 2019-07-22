<?php
require 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once 'examples/RouteClass.php';
require_once 'examples/RouteClass2.php';

require_once 'FrontController.php';
require_once 'examples/controllers/Controller404.php';

require_once 'examples/controllers/Controller1.php';
require_once 'examples/controllers/Controllerdb.php';
require_once 'examples/controllers/ControllerA.php';
require_once 'examples/controllers/ControllerB.php';
require_once 'examples/controllers/ControllerC.php';
require_once 'examples/controllers/ControllerD.php';

require 'config.php';

require 'Router.php';
require 'examples/MiddlewareClass.php';

$request = Request::createFromGlobals();

$router = new Router(BASE_URL);

$router->setController(new Controller404($router));

$db_conect = new DatabaseClass2('localhost', 'root', '', 'php_framework');

$router->addRoute(new RouteClass('','page-1', new Controller1, new MiddlewareClass() ));

$router->addRoute(new RouteClass('db','db', new Controllerdb($db_conect)));

$router->addRoute(new RouteClass2('a/b','page-a',  new ControllerA($router, $db_conect)));

$router->addRoute(new RouteClass('b','page-b', new ControllerB));
$router->addRoute(new RouteClass('c','page-c', new ControllerC($router)));

$router->addRoute(new RouteClass2('d', 'page-db' , new ControllerD($router), new MiddlewareClass()));


$fc = new FrontController( $router);
//
$response = $fc->handle($request);
//
$response->send();



$uri = $router->buildRoute('page-db', [10]);
 echo $uri;
 echo '<br>';
//$uri = $router->buildRoute('page-db');
//echo $uri;
echo '<br>';

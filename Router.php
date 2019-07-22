<?php

use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\HttpFoundation\Response;

require_once 'examples/RouteClass.php';
require_once 'Conroller_with_params.php';





class Router
{
    private $url;
    private $controller404;
   public $routes = array();

   public function __construct( $base_url ){

       $this->url = $base_url;


   }

    public function setController(ControllerInterface $controller404 ){


        $this->controller404 = $controller404;
    }




    public function addRoute(RouteInterface $routes )
    {
        $this->routes[] = $routes;

        return $routes;


    }


    public function getController(Request $request): Conroller_with_params
    {
        //require 'routes.php';


        /** @var RouteInterface $route */
        foreach ($this->routes as $route) {

            if ($route->checkRoute($request)) {

               // dump($route->getMiddleware());

         /** @var ControllerInterface $controller */

                return new Conroller_with_params($route->getUriParam( $request), $route->getController(), $route->getMiddleware());
                break;
            }

        }
        //$error = $this->controller404;
        return new Conroller_with_params([], $this->controller404);

    }


    public function buildRoute(string $routName, $uri_param=[])
    {

        foreach ($this->routes as $route) {

            if ($route->getRouteName() == $routName){


           return $this->url.$route->BuildRoute($uri_param);

            }


        }
    }




}
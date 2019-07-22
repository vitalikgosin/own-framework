<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 07/03/2019
 * Time: 17:13
 */

require 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;


require 'RouteInterface.php';



class RouteClass implements RouteInterface
{
    private $pattern;
    private $routename;
    private $controller;
    private $middleware;

    public function __construct(string $pattern, string $routename, ControllerInterface $controller, MiddlewareInterface $middleware=NULL)
    {
        $this->pattern = $pattern;
        $this->routename = $routename;
        $this->controller = $controller;
        $this->middleware = $middleware;
    }
    public function checkRoute(Request $request): bool
    {

        if ($request->getRequestUri() === '/'.$this->pattern) {
            return true;
        } else {
            return false;
        }
    }
    public function getController():ControllerInterface
    {
        return $this->controller;

    }

    public function getMiddleware():?MiddlewareInterface
    {
        return $this->middleware;

    }


    public function getRouteName():string
    {
        return $this->routename;
    }

    public function getUriParam(Request $request):Array
    {


        return [];

    }



    public function buildRoute(array $uri_param = []):string
    {

        if ($uri_param){

           // dd($uri_param);
            $pattern = '/' . $this->pattern . '/' . $uri_param[0];

        return $pattern;
    }
    else{
        $pattern = '/' . $this->pattern;

        return $pattern;
    }

    }


}

/*
class RouteRedirectClass implements RouteInterface
{
    //private $pattern;
    private $controller;
*/


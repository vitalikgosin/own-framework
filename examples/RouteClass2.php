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


class RouteClass2 implements RouteInterface
{
    private $pattern;
    private $routename;
    private $controller;
    private $middleware;


    public function __construct(string $pattern, string $routename,  ControllerInterface $controller, MiddlewareInterface $middleware=NULL)
    {

        $this->routename = $routename;
        $this->controller = $controller;
        $this->pattern = $pattern;
        $this->middleware = $middleware;


    }

    public function checkRoute(Request $request): bool
    {

        $str = $request->getRequestUri();


        $arr = explode("/", $str);

        array_pop($arr);

        $str = join('/', $arr);




        return  $str == '/'.$this->pattern;

    }


    public function getController(): ControllerInterface
    {

        return $this->controller;
    }

    public function getRouteName():string
    {
        return $this->routename;
    }

    public function getUriParam(Request $request):Array
    {

        $uri = $request->getRequestUri();
        $arr = explode("/", $uri);
        //dd($arr[3]);
        return [$arr[count($arr)-1]];

    }

    public function getMiddleware():?MiddlewareInterface
    {
        return $this->middleware;

    }






    public function buildRoute(array $uri_param = []):string
    {


                $pattern = '/'.$this->pattern.'/'.$uri_param[0];

             return $pattern;

            }




}

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

    public function __construct(string $pattern, string $routename, ControllerInterface $controller)
    {
        $this->pattern = $pattern;
        $this->routename = $routename;
        $this->controller = $controller;
    }
    public function checkRoute(Request $request): bool
    {
        if ($request->getRequestUri() === $this->pattern) {
            return true;
        } else {
            return false;
        }
    }
    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getRouteName()
    {
        return $this->routename;
    }


}

/*
class RouteRedirectClass implements RouteInterface
{
    //private $pattern;
    private $controller;
*/


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


require __DIR__.'/interfaceRout.php';



class RouteClass
{
    private $pattern;
    private $controller;

    public function __construct(string $pattern, ControllerInterface $controller)
    {
        $this->pattern = $pattern;
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
}
require 'config.php';

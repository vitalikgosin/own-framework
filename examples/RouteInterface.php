<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 07/03/2019
 * Time: 17:12
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface RouteInterface
{
    public function checkRoute(Request $request): bool;
    public function getController(): ControllerInterface;

    public function getUriParam(Request $request):array;

    public function getMiddleware():?MiddlewareInterface;

    public function getRouteName():string;
    public function buildRoute(array $uri_param):string;
}


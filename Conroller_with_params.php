<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 09/04/2019
 * Time: 20:23
 */

class Conroller_with_params
{

    private $controller;
    private $middleware;
    private $params;

    public function __construct(array $params, ControllerInterface $controller, Middlewareinterface $middleware = NULL )
    {


        $this->controller = $controller;
        $this->middleware = $middleware;
        $this->params = $params;


    }

    /**
     * @return ControllerInterface
     */
    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    /**
     * @return ControllerInterface
     */
    public function getMiddleware():?MiddlewareInterface
    {
        return $this->middleware;
    }

    /**
     * @return string
     */
    public function getParams(): array
    {
        return $this->params;
    }




}
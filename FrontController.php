<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\RedirectResponse;

class FrontController
{
    public function __construct(Router $router){
        $this->router = $router;

    }

    public function handle(Request $request): Response
    {

        $controller_with_params = $this->router->getController($request);

        //$this->router->getMiddleware()->before($request);
        if ($controller_with_params->getMiddleware()) {

            dump($controller_with_params->getMiddleware()->before($request));

        }




    $response = $controller_with_params->getController()->getHtml($request, $controller_with_params->getParams());

        //$controller_with_params->getController()->insertMethod();
    return $response;

}

}
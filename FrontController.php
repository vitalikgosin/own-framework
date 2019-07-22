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

$controller = $this->router->getController($request);

if ( $controller) {
    $response = $controller->getHtml($request);
    return $response;
}
else{
   // dd (gettype($this->router->buildRoute( 'page-b')));
//    $redirectUrl  = $this->router->buildRoute( 'page-b');
//    $response = new RedirectResponse($redirectUrl);

    return $response;
}
}

}
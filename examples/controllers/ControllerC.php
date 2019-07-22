<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 14/03/2019
 * Time: 17:10
 */


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



require_once __DIR__.'/../ControllerInterface.php';

use Symfony\Component\HttpFoundation\RedirectResponse;


class ControllerC implements ControllerInterface
{

    private $uri_param;
    private $router;

    public function __construct(Router $router){
        $this->router = $router;

    }

    public function getHtml(Request $request, $uri_param=[]):Response{

        $redirectUrl = $this->router->buildRoute('page-b');
        $response = new RedirectResponse($redirectUrl);
        dump($response);

        return $response;
    }

    public function someMethod ($request){
        $response = new Response($request);
        return $response;
    }

}
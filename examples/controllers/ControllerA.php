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

class ControllerA implements ControllerInterface
{

    private $router;

    public function __construct(Router $router){
        $this->router = $router;

    }

    public function getHtml(Request $request,  $params):Response{

        //$uri = $request->getRequestUri();
        //$arr = explode("/", $uri);

        //dd($arr[3]);

        $response = new Response(
            $this->router->buildRoute('page-db', $params),

            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );


        return $response;

    }

    public function someMethod ($request){
        $response = new Response($request);
        return $response;
    }

}
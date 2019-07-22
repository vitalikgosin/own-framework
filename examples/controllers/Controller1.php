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


class Controller1 implements ControllerInterface
{



    public function getHtml(Request $request, $uri_param=[]):Response{



        $response = new Response(
            "content",
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
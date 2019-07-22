<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 07/03/2019
 * Time: 17:13
 */


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


require_once __DIR__.'/ControllerInterface.php';

class ControllerClass implements ControllerInterface
{

    public function getHtml(Request $request):Response{
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

class Controller2 implements ControllerInterface
{

    public function getHtml (Request $request):Response{
        $response = new Response($request);
        return $response;
    }

}






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

require_once __DIR__.'/../DatabaseClass.php';

class Controller1 implements ControllerInterface
{



    public function getHtml(Request $request, $uri_param=[]):Response{

        $db = new Database('localhost', 'root', '', 'php_framework', 1);
        $row = $db->db_select('user', [10]);


        $response = new Response(
            ".$row.",
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
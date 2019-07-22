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

require_once __DIR__.'/../DatabaseClass2.php';

class Controllerdb implements ControllerInterface
{
    private $db;
    public function __construct(DatabaseClass2 $db){
        $this->db = $db;

    }

    public function getHtml(Request $request, $uri_param=[]):Response{

        //$db = new DatabaseClass2('localhost', 'root', '', 'php_framework');
        $db = $this->db;
        $row = $db->db_select('user', 'id=?', [2]);

        $db->db_update('user', 'id=3', ['user_name'=>'Ilia-new', 'user_email' => 'email-new']);


        //$row_insert = $db->db_insert('user', ['name'=>'Ilia', 'email' => '...']);
        dump($row);
        $row_data = json_encode($row);
        //dd($row);

        $response = new Response(
            $row_data,
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );

        return $response;

    }

    public function insertMethod (){
        $db = new DatabaseClass('localhost', 'root', '', 'php_framework');
       dump($db->db_insert('user', ['user_name'=>'ana', 'user_email' => 'ana@gmail.com', 'is_active'=>'1']));
    }

}
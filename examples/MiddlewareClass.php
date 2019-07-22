<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 25/04/2019
 * Time: 18:14
 */

use Symfony\Component\HttpFoundation\Request;
require 'MiddlewareInterface.php';

class MiddlewareClass implements MiddlewareInterface
{

    public function before (Request $request):void
    {
        session_start();

        $_SESSION['user_name'] = 'Max';


    }
}
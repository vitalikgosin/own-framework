<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 07/03/2019
 * Time: 17:12
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface MiddlewareInterface
{

    public function before (Request $request):void;

}


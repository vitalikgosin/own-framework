<?php
//require 'examples/controllers/ControllerClass.php';
require_once 'examples/controllers/ControllerA.php';
require_once 'examples/controllers/ControllerB.php';
require_once 'examples/controllers/ControllerC.php';
require_once 'examples/controllers/ControllerD.php';

$routes=[];

$routes[] = new RouteClass('a', new ControllerA);
$routes[] = new RouteClass('b', new ControllerB);
$routes[] = new RouteClass('c', new ControllerC);
$routes[] = new RouteClass('d', new ControllerD);
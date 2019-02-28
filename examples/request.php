<?php
require '../vendor/autoload.php';

// composer require symfony/http-foundation
// composer require --dev symfony/var-dumper
// https://symfony.com/doc/current/components/http_foundation.html

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

dump($request);

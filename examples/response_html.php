<?php
require '../vendor/autoload.php';

// composer require symfony/http-foundation
// composer require --dev symfony/var-dumper
// https://symfony.com/doc/current/components/http_foundation.html#response

use Symfony\Component\HttpFoundation\Response;

$response = new Response('Content');
dump($response);

$response = new Response(
    'Content',
    Response::HTTP_OK,
    ['content-type' => 'text/html']
);
dump($response);

// $response->send();

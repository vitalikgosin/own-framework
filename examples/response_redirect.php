<?php
require '../vendor/autoload.php';

// composer require symfony/http-foundation
// composer require --dev symfony/var-dumper
// https://symfony.com/doc/current/components/http_foundation.html#response

use Symfony\Component\HttpFoundation\RedirectResponse;

$response = new RedirectResponse('http://example.com/');
dump($response);

// $response->send();

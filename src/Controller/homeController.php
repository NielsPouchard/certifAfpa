<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

function home_controller(Request $request): Response
{
    var_dump('controller');
    $response = render_template($request);
    $response->headers->set('Content-Type','text/html');
    return $response;
}

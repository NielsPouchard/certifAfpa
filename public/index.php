<?php
// framework/front.php
session_start();
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use App\Kernel;

function render_template(Request $request): Response
{
    extract($request->attributes->all(),EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__ . '/../src/View/%s.php', $_route);
    return new Response(ob_get_clean());
}

$request = Request::createFromGlobals();

$routes = require __DIR__."/../src/Routing/Mapping.php";

$context = new Routing\RequestContext();

$context->fromRequest($request);

$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$kernel = new Kernel($matcher);

try {
    $response = $kernel->handle($request);
} catch (\Exception $exception) {
    throw new Exception($exception->getMessage());
}

$response->send();

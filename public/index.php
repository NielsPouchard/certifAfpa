<?php
// framework/front.php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use App\Kernel;

$request = Request::createFromGlobals();

$routes = require __DIR__."/../src/Routing/Mapping.php";

$context = new Routing\RequestContext();

$context->fromRequest($request);

$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$kernel = new Kernel($matcher);

function get_view(Request $request)
{
    var_dump('controller');
    $response = render_template($request->attributes->get('_route'));
    $response->headers->set('Content-Type','text/html');
    return $response;
}

function render_template(string $view): Response
{
    ob_start();
    include sprintf(__DIR__ . '/../src/View/%s.php', $view);
    return new Response(ob_get_clean());
}

try {
    $response = $kernel->handle($request);
} catch (\Exception $exception) {
    throw new Exception($exception->getMessage());
}

$response->send();

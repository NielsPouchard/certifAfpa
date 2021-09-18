<?php
// framework/front.php
session_start();
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use App\Kernel;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;


function render_template(Request $request): Response
{
    ob_start();
    include sprintf(__DIR__ . '/../src/View/%s.php', $request->attributes->get('_route')->getRequirements()['_name']);
    return new Response(ob_get_clean());
}

function render_twig(Request $request, ?string $template = 'home', ?array $arguments = [])
{
    extract($request->attributes->all(),EXTR_SKIP);
    ob_start();
    $loader = new FilesystemLoader(__DIR__."/../src/View/");
    $twig = new Environment($loader, [
        'debug' => true,
        'cache' => __DIR__."/cache"
    ]);
    $twigRender = $twig->render($template.".twig" ?? 'home.twig', $arguments);
    return new Response($twigRender);
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
    var_dump($exception);
    throw new Exception($exception->getMessage());
}

$response->send();

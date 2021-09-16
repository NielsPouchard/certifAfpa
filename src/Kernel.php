<?php

namespace App;

use App\Routing\RouteMapping;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Kernel extends AbstractKernel
{
    use RouteMapping;

    public function __construct(UrlMatcher $matcher)
    {
        $this->matcher = $matcher;
        $this->routeCollection = require __DIR__."/Routing/Mapping.php";
    }
    public function handle(Request $request): Response
    {
        try {
            $routeMatch = $this->matcher->match($request->getPathInfo());
        } catch (ResourceNotFoundException $exception) {
            return new Response(
                'Not Found',
                Response::HTTP_NOT_FOUND
            );
        } catch (\Exception $exception) {
            return new Response("An error occurred", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        var_dump($routeMatch);
        try {
            $controllerFilename = $routeMatch['_route']."Controller";
            include sprintf(__DIR__."/Controller/%s.php", $controllerFilename);
            var_dump('file found');
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
        $this->addRouteMatchToRequest($routeMatch, $request);
        // get controller function or callback
        $controller = $this->getController($routeMatch['_route']);
        var_dump($controller);
        return get_view($request);
    }

    protected function getController(string $route): string
    {
        return $this->routeCollection->get($route)->getDefaults()['_controller'];
    }

    private function addRouteMatchToRequest(array $routeMatch, Request $request)
    {
        // add route match array result to request attributes
        $request->attributes->add($routeMatch);
    }

    private function controllerExists(string $controller)
    {
        return is_callable($controller) || function_exists($controller);
    }
}

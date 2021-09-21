<?php

namespace App;

use App\Routing\RouteMapping;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing\Route;

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
        // get current route in order to inject to Request->attributes
        $currentRoute = $this->getRouteCollection()->get($this->matcher->match($request->getPathInfo())['_route']);
        try {
            // match current path with one route from Mapping
            $routeMatch = $this->matcher->match($request->getPathInfo());
        } catch (ResourceNotFoundException $exception) {
            return new Response(
                'Not Found',
                Response::HTTP_NOT_FOUND
            );
        } catch (\Exception $exception) {
            return new Response("An error occurred", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        // inject match to Request->attributes
        $this->addRouteMatchToRequest($routeMatch, $request);
        // inject current route to Request->attributes -> get view in render_template
        $this->addRouteNameToRequest($currentRoute, $request);

        $controllerResolver = new HttpKernel\Controller\ControllerResolver();
        $argumentResolver = new HttpKernel\Controller\ArgumentResolver();
        // automatic call of dedicated controller class from Request object
        $controller = $controllerResolver->getController($request);
        // resolve arguments
        $arguments = $argumentResolver->getArguments($request, $controller);
        // get response from controller
        $response = call_user_func_array($controller, $arguments);
        // optionally set needed headers
        $response->headers->set('Content-Type','text/html');
        return $response;
    }

    private function addRouteMatchToRequest(array $routeMatch, Request $request): void
    {
        // add route match array result to request attributes
        $request->attributes->add($routeMatch);
    }

    private function addRouteNameToRequest(Route $route, Request $request)
    {
        // add view name for render_template function
        $request->attributes->add(['_route' => $route]);
    }

    protected function getController(string $route): string
    {
        return $this->routeCollection->get($route)->getDefaults()['_controller'];
    }
}

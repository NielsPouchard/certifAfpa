<?php

namespace App;

use App\Routing\RouteMapping;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel;

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
        $this->addRouteMatchToRequest($routeMatch, $request);

        $controllerResolver = new HttpKernel\Controller\ControllerResolver();
        $argumentResolver = new HttpKernel\Controller\ArgumentResolver();

        $controller = $controllerResolver->getController($request);
        $arguments = $argumentResolver->getArguments($request, $controller);
        $response = call_user_func_array($controller, $arguments);
        $response->headers->set('Content-Type','text/html');
        return $response;
    }

    protected function getController(string $route): string
    {
        return $this->routeCollection->get($route)->getDefaults()['_controller'];
    }

    private function addRouteMatchToRequest(array $routeMatch, Request $request): void
    {
        // add route match array result to request attributes
        $request->attributes->add($routeMatch);
    }
}

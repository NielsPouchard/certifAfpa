<?php
namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;
use Symfony\Component\Routing;

abstract class AbstractKernel
{
    protected UrlMatcherInterface $matcher;
    protected ?Routing\RouteCollection $routeCollection;
    protected ?Routing\Route $currentRoute = null;

    /**
     * @return mixed|Routing\RouteCollection
     */
    public function getRouteCollection(): ?Routing\RouteCollection
    {
        return $this->routeCollection;
    }

    /**
     * @return UrlMatcherInterface
     */
    public function getMatcher(): UrlMatcherInterface
    {
        return $this->matcher;
    }

    /**
     * @return Routing\Route|null
     */
    public function getCurrentRoute(): ?Routing\Route
    {
        return $this->currentRoute;
    }

    abstract public function handle(Request $request): Response;

    abstract protected function getController(string $route): string;
}

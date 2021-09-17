<?php
namespace App\Controller;

use App\Database\DB;
use App\Repository\RouteCollectionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteCollectionController
{
    public function createRoute(Request $request)
    {
        return render_template($request);
    }

    public function getRouteCollection(Request $request)
    {
        $routeCollectionRepository = new RouteCollectionRepository();
        $routes = $routeCollectionRepository->getRoutes();
        if (0 === count($routes)) {
            return new \Symfony\Component\HttpFoundation\Response("No routes", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return render_template($request);
    }
}

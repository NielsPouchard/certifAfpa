<?php

namespace App\Repository;

class RouteCollectionRepository extends AbstractRepository
{
    public function postRoute($route)
    {
        $insert = $this->getDb()->prepare("INSERT INTO route(name, path, controller, method, package) VALUES (:name, :path, :controller, :method, :package)");
        $insert->execute([
            'name' => $route->name,
            'path' => $route->path,
            'controller' => $route->controller,
            'method' => $route->method,
            'package' => $route->package,
        ]);
        return $insert->fetchObject();
    }

    public function getRoutes()
    {
        $query = $this->getDb()->prepare("SELECT * FROM route");
        $query->execute([]);
        return $query->fetchObject();
    }
}

<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$map = [
    '/'                 => 'home',
    '/user'                 => 'user',
    '/register'        => 'register',
    '/login'        => 'login',
    '/messenger'            => 'messenger',
    '/updateProfileUser'    => 'updateProfileUser',
    '/forgotPassword'       => 'forgotPassword',
    '/actuality'            => 'actuality',
    '/admin'                => 'admin',
    '/findFriends'          => 'findFriends',
    '/search-bar'           => 'searchBar'
];

foreach ($map as $key => $value) {
    $routes->add($value, new Route($key, [
        '_controller' => $value."_controller"
    ]));
}

return $routes;

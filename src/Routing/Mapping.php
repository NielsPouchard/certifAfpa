<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$map = [
    '/' => [
        '_name' => 'home',
        '_controller' => 'Home_Controller',
    ],
    '/routing' => [
        '_name' => 'routing',
        '_controller' => 'RouteCollection',
        '_method' => 'createRoute',
        '_http_verb' => 'POST'
    ],
    '/routes' => [
        '_name' => 'routes',
        '_controller' => 'RouteCollection',
    ],
    '/login' => [
        '_name' => 'login',
        '_controller' => 'Login_Controller',
    ],
    '/logout' => [
        '_name' => 'logout',
        '_controller' => 'Logout_Controller',
        '_method' => 'logout'
    ],
    '/register' => [
        '_name' => 'register',
        '_controller' => 'Register_Controller',
        '_method' => 'register'
    ],
    '/user' => [
        '_name' => 'user',
        '_controller' => 'User_Controller',
    ],
    '/messenger' => [
        '_name' => 'messenger',
        '_controller' => 'Messenger_Controller',
        '_method' => 'messenger'
    ],
    '/updateProfileUser' => [
        '_name' => 'updateProfileUser',
        '_controller' => 'UpdateProfileUser_Controller',
    ]
//    '/updateProfileUser'    => 'updateProfileUser',
//    '/forgotPassword'       => 'forgotPassword',
//    '/actuality'            => 'actuality',
//    '/admin'                => 'admin',
//    '/findFriends'          => 'findFriends',
//    '/search-bar'           => 'searchBar'
];

foreach ($map as $key => $value) {
    $methodName = $value['_method'] ?? 'index';
    $routes->add($key, new Route(
        $key,
        ['_controller' => "App\\Controller\\{$value['_controller']}::{$methodName}"],
        ['_name' => $value['_name']]
    ));
}

return $routes;

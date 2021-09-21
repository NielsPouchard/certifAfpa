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
        '_method' => 'login'
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
        '_method' => 'user'       
    ],
    '/messenger' => [
        '_name' => 'messenger',
        '_controller' => 'Messenger_Controller',
        '_method' => 'messenger'
    ],
    '/updateProfileUser' => [
        '_name' => 'updateProfileUser',
        '_controller' => 'UpdateProfileUser_Controller',
        '_method' => 'UpdateProfileUser',
    ],
    '/upload' => [
        '_name' => 'upload',
        '_controller' => 'Upload_Controller',
        '_method' => 'upload',
    ],
    '/actuality' => [
        '_name' => 'actuality',
        '_controller' => 'actuality_Controller',
    ],
    '/findFriends' => [
        '_name' => 'findFriends',
        '_controller' => 'findFriends_Controller',
    ],
    '/search-bar' => [
        '_name' => 'serach-bar',
        '_controller' => 'search-bar_Controller',
        '_method' => 'search_bar'
    ],
    '/admin' => [
        '_name' => 'admin',
        '_controller' => 'admin_Controller',
        '_method' => 'admin'
    ],
    '/forgotPassword' => [
        '_name' => 'forgotPassword',
        '_controller' => 'forgotPassword_Controller',
        '_method' => 'forgotPassword'
    ],
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

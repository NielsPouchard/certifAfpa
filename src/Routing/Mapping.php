<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$map = [
    '/' => [
        // name of route
        '_name' => 'home',
        // controller class name
        '_controller' => 'Home_Controller',
        // method/function name
        '_action' => 'home',
        // HTTP method(GET|POST|PUT|PATCH|DELETE|OPTIONS)
        '_method' => 'GET'
    ],
    '/login' => [
        '_name' => 'login',
        '_controller' => 'Login_Controller',
        '_action' => 'login',
        '_method' => 'POST'
    ],
    '/logout' => [
        '_name' => 'logout',
        '_controller' => 'Logout_Controller',
        '_action' => 'logout',
        '_method' => 'GET',
    ],
    '/register' => [
        '_name' => 'register',
        '_controller' => 'Register_Controller',
        '_action' => 'register',
        '_method' => 'POST',
    ],
    '/user' => [
        '_name' => 'user',
        '_controller' => 'User_Controller',
        '_action' => 'user',
        '_method' => 'GET'
    ],
    '/messenger' => [
        '_name' => 'messenger',
        '_controller' => 'Messenger_Controller',
        '_action' => 'messenger',
        '_method' => 'GET',
    ],
    '/update-profile-user' => [
        '_name' => 'update-profile-user',
        '_controller' => 'UpdateProfileUser_Controller',
        '_action' => 'updateUserProfile',
        '_method' => 'POST'
    ]
//    '/forgotPassword'       => 'forgotPassword',
//    '/actuality'            => 'actuality',
//    '/admin'                => 'admin',
//    '/findFriends'          => 'findFriends',
//    '/search-bar'           => 'searchBar'
];

foreach ($map as $key => $value) {
    $methodName = $value['_action'] ?? 'index';
    $routes->add($key, new Route(
        $key,
        ['_controller' => "App\\Controller\\{$value['_controller']}::{$methodName}"],
        ['_method' => $value['_method']]
    ));
}

return $routes;

<?php
namespace App\Routing;

trait RouteMapping
{
    protected array $mapping = [
        '/' => 'home',
        '/home' => 'home',
        '/login' => 'login',
        '/registration' => 'registration',
        '/hello' => 'hello',
        '/register' => 'register',
        '/user' => 'user',
        '/user-profile' => 'user_profile'
    ];
}

<?php 
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = [
    '/actuality'		 => __DIR__.'/actuality.php',
    '/admin'  			 => __DIR__.'/admin.php',
	'/findFriends' 		 => __DIR__.'/findFriends.php',
    '/forgot_password'   => __DIR__.'/forgot_password.php',
    '/messenger' 		 => __DIR__.'/messenger.php',
    '/registerLogin'  	 => __DIR__.'/registerLogin.php',
    '/updateProfileUser' => __DIR__.'/updateProfileUser.php',
    '/user'   			 => __DIR__.'/user.php',
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
	require $map[$path];
	
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();   









<?php 

require_once __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/controlers/bdd.php';
require_once __DIR__.'/controlers/models/User.php';
require_once __DIR__.'/controlers/models/Picture.php';


$bdd = getBdd();
$request = Request::createFromGlobals();
$response = new Response();
$userModel = new User();
$pictureModel = new Picture();

$map = [
    '/user'                 => 'user',
    '/registerLogin'        => 'registerLogin',
    '/messenger'            => 'messenger',
    '/updateProfileUser'    => 'updateProfileUser',
    '/forgotPassword'       => 'forgotPassword',
    '/actuality'            => 'actuality',
    '/admin'                => 'admin',
    '/findFriends'          => 'findFriends',
];

$path = $request->getPathInfo();
/*  var_dump(__DIR__.'/src/pages/'.$map[$path].".php");
 */
if (isset($map[$path])) {
    ob_start();// Mise en tapon des données que l'on veut afficher  
    include __DIR__.'/src/pages/'.$map[$path].".php";
    $response->setContent(ob_get_clean());// On place tout ce qui a été afficher dans le tampon

} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();


















/* echo "hello World";

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = [
    '/actuality'		 => __DIR__.'\src\pages\actuality.php',
    '/admin'  			 => __DIR__.'\src\pages\admin.php',
	'/findFriends' 		 => __DIR__.'\src\pages\findFriends.php',
    '/forgot_password'   => __DIR__.'\src\pages\forgot_password.php',
    '/messenger' 		 => __DIR__.'\src\pages\messenger.php',
    '/registerLogin'  	 => __DIR__.'\src\pages\registerLogin.php',
    '/updateProfileUser' => __DIR__.'\src\page\updateProfileUser.php',
    '/user'   			 => __DIR__.'\src\pages\user.php',
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
	require $map[$path];
} 

else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();    
	
var_dump($response, $map); */







<?php
namespace App\Controller;

use App\Routing\Router;
use Symfony\Component\HttpFoundation\Response;

ob_start();
//die('home controller');
//if (Router::isHome($_SERVER['REQUEST_URI'])) {
//    include sprintf('../views/view/home.php');
//} else {
//    die('not home');
//    $content = include sprintf('../views/view/%s.php', $_SERVER['REQUEST_URI']);
//}
var_dump($_SERVER['REQUEST_URI']);
include sprintf(__DIR__.'/../../views/view%s.php', $_SERVER['REQUEST_URI']);

$response = new Response();
$response->setStatusCode(200);
$response->setContent(ob_get_clean());
$response->send();

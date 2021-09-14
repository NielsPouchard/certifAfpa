<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Database\DB;

$db = DB::getDb();

$request = Request::createFromGlobals();

$router = new \App\Routing\Router();
$router->handleRequest($request);
//var_dump($response);
//die('index end');

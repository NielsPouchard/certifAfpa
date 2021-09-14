<?php
namespace App\Routing;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractRouter
{
    abstract public function handleRequest(Request $request);
}

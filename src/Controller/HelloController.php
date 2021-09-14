<?php
namespace App\Controller;

use App\Routing\Router;

class HelloController
{
    public function hello()
    {
        ob_start();
        die('hello controller');
    }
}

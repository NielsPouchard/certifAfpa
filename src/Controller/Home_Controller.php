<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Home_Controller
{
    public function home(Request $request): Response
    {
        return render_twig($request, 'home', ['name' => "FACEVOOK"]);
    }
}

<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Home_Controller
{
    public function index(Request $request): Response
    {
        return render_template($request);
    }
}

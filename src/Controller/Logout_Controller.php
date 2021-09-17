<?php
namespace App\Controller;
session_start();

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Logout_Controller
{
    public function logout(Request $request)
    {
        unset($_SESSION['user']);
        session_destroy();
        return new RedirectResponse('/');
    }
}

<?php
namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class User_Controller
{
    public function user(Request $request)
    {
        if (!isset($_SESSION['user']) || null === $_SESSION['user']) {
            return new RedirectResponse('/login');
        }
        if ($request->isMethod('GET') && is_int((int)$_SESSION['user']['id'])) {
            $userId = (int)$_SESSION['user']['id'];
            $userRepository = new UserRepository();
            $user = $userRepository->getUserById($userId);
            if (null === $user) {
                // error
            }
            return render_twig($request, 'user', ['user' => $user]);
        }
        return render_twig($request, 'user');
    }
}

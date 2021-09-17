<?php
namespace App\Controller;

use App\Model\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class User_Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('GET') && is_int((int)$request->query->get('id'))) {
            var_dump('ok');
            $userId = (int)$request->query->get('id');
            $userRepository = new UserRepository();
            $user = $userRepository->getUserById($userId);
            if (null === $user) {
                // error
            }
        }
        return render_template($request);
    }
}

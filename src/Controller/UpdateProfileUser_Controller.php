<?php
namespace App\Controller;

use App\Model\UserProfile;
use App\Repository\UserRepository;
use App\Utils\RequestFormValidator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateProfileUser_Controller
{
    use RequestFormValidator;

    public function updateUserProfile(Request $request)
    {
        if (!isset($_SESSION['user']) || null === $_SESSION['user']) {
            return new RedirectResponse('/login');
        }
        if ($request->isMethod('POST')) {
            if (isset($_POST['update'])) {
                if ($this->isUserProfileFormValid($request)) {
                    $userProfile = new UserProfile($request);
                    $iduser = $_SESSION['user']->id;

                    $userRepository = new UserRepository();
                    $user = $userRepository->getUserById($iduser);

                    if (null === $user) {
                        return new Response("No user");
                    }
                    if (!filter_var($userProfile->email, FILTER_VALIDATE_EMAIL)) {
                        return new Response("Email not valid");
                    }

                    $userRepository->updateUser(compact('name', 'surname', 'email', 'pseudo', 'iduser'));
                    $_SESSION['user'] = $userProfile;

                    return new RedirectResponse('/updateProfileUser');
                }
            }
        }
        return render_twig($request, 'update_profile_user', ['user' => $_SESSION['user']]);
    }
}

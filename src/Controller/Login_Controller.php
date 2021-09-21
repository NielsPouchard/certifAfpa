<?php
namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Model\UserCredentials;
use App\Model\UserSession;

class Login_Controller
{
    public function login(Request $request): Response
    {
        if (isset($_SESSION['user'])) {
            return new RedirectResponse('/user');
        }
        if ($request->isMethod('POST')) {
            $userCredentials = $this->get_credentials_from_request($request);
            var_dump($userCredentials);
            $userRepository = new UserRepository();
            $userFromDb = $userRepository->getUserByEmail($userCredentials->email);
            if (null === $userFromDb) {
                return new RedirectResponse('/login');
            }
            $password = password_verify($userCredentials->password, $userFromDb->mdp);

            if (!$this->isEmailValid($userCredentials->email)) {
                return new RedirectResponse('/login');
            }
            if (!$password) {
                return new RedirectResponse('/login');
            }
            $userSession = new UserSession($userFromDb);
            $_SESSION['user']['id'] = $userSession->id;
            $_SESSION['user']['name'] = $userSession->name;
            $_SESSION['user']['surname'] = $userSession->surname;
            $_SESSION['user']['pseudo'] = $userSession->pseudo;
            $_SESSION['user']['email'] = $userSession->email;
            $_SESSION['user']['photo'] = $userSession->photo;
            $_SESSION['user']['role'] = $userSession->role;

            if ($_SESSION['user']['role'] === 'userAdmin') {
                return new RedirectResponse('/admin');

            }
            return new RedirectResponse('/user');

        }
        return render_twig($request, 'home');
    }

    private function get_credentials_from_request(Request $request): ?UserCredentials
    {
        if (!empty($request->request->get('email'))  && !empty($request->request->get('mdp'))) {
            $email = htmlspecialchars($request->request->get('email'));
            $mdp = htmlspecialchars($request->request->get('mdp'));
            return new UserCredentials($email,$mdp);
        }
        return null;
    }

    private function isEmailValid(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

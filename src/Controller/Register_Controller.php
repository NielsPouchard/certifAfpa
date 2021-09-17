<?php
namespace App\Controller;

use App\Model\RegistrationUser;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Utils\RequestFormValidator;

class Register_Controller
{
    use RequestFormValidator;

    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            if ($this->isRegisterFormValid($request)) {

                $userRegistration = new RegistrationUser($request);
                $userRepository = new UserRepository();
                $userExists = $userRepository->checkIfUserExists($userRegistration->email);
                if (null !== $userExists && $userRegistration->email === $userExists->email) {
                    return new Response("Compte déja crée, veuillez vous connecter");
                }
                // check pseudo length
                if (strlen($userRegistration->pseudo) > 45) {
                    return new Response("Format trop long");
                }
                // check email validity
                if (strlen($userRegistration->email) > 45 && !filter_var($userRegistration->email, FILTER_VALIDATE_EMAIL)) {
                    return new Response("Format non valide");
                }
                // check password validity
                if ($userRegistration->confirmPassword !== $userRegistration->password) {
                    return new Response("Les mots de passe ne correspondent pas.");
                }
                // hash password
                $hashedPassword = password_hash($userRegistration->password, PASSWORD_BCRYPT);
                $userRegistration->password = $hashedPassword;
                // insert user
                $registration = $userRepository->register($userRegistration);
                // false
                var_dump($registration);
                return new RedirectResponse('/login', Response::HTTP_TEMPORARY_REDIRECT);
            }
            return new Response("Veuillez compléter tous les champs*", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return render_template($request);
    }
}

<?php
session_start();
use App\Database\DB;
use Symfony\Component\HttpFoundation\Request;

$bdd = DB::getDb();
if (!isset($_POST['connexion'])) {
	ob_start();
	include __DIR__.'/../View/registerLogin.php';
}
function get_credentials_from_request(Request $request): ?\App\Model\User
{
    if (!empty($_POST['email'])  && !empty($_POST['mdp'])) {
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        return new \App\Model\User($email,$mdp);
    }
    return null;
}

function isEmailValid(string $email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function login_controller(Request $request)
{
    if ($request->isMethod('POST')) {
        $userCredentials = get_credentials_from_request($request);
        $userRepository = new \App\Repository\UserRepository();
        $data = $userRepository->checkIfUserExists($userCredentials->getEmail());
        if ($data) {
            $password = password_verify($userCredentials->getPassword(), $data['mdp']);

            if ($password) {
                $userSession = new \App\Model\UserSession($data);
                $_SESSION['user'] = $userSession;

                if ($data['role'] === 'userAdmin') {
                    header("Location: admin.php?id=".$_SESSION['iduser']);

                }else header("Location: user.php?id=".$_SESSION['iduser']);
            }
        }
    }
    render_template('login', $request);
}

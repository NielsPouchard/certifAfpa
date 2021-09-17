<?php
session_start();
use App\Model\User;

// 1-Login
if (isset($_POST['connexion'])) {
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if (!empty($_POST['email'])  && !empty($_POST['mdp'])) {

        $userModel = new User();
        $data = $userModel->checkUsers($email);
        // On va rechercher avec rowCount si le user existe dans la table
        $row = count($data);
        var_dump($row);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = password_verify($mdp, $data['mdp']);

            if ($password) {
                $_SESSION['iduser'] = $data['iduser'];
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['surName'] = $data['surName'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['pseudo'] = $data['pseudo'];
                $_SESSION['photo'] = $data['photo'];

                if ($data['role'] === 'userAdmin') {
                    header("Location: /../../admin.php?id=".$_SESSION['iduser']);

                }else header("Location: /../../user.php?id=".$_SESSION['iduser']);
            }
        }else header('Location: /../../../index.php');
    }else header('Location: /../../../index.php');
}

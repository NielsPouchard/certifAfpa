<?php
session_start();
use App\Database\DB;

$bdd = DB::getDb();

if (isset($_POST['email'])) {

    $password = uniqid(); //Génère un identifiant unique -> ??? comment tu peux connaitre le mot de passe si tu le génères ?
    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

    $message = "Bonjour, voici votre nouveau Mot de Passe: $password";// Envoie du mdp en clair, pas hash: DO NOT DO THAT, NEVER
    $headers = 'Content-Type: text/plain; charset="utf-8"'." ";// permet de gérer les caractères spéciaux

    if(mail($_POST['email'] && !empty($_POST['email']), 'Mot de passe oiblié', $message, $headers)){

        $sql = "UPDATE user SET password = ? WHERE email = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$hasedPassword, $_POST('email')]);

        echo "Email envoyé";

    }else {
        echo "Une erreur est survenue";
    }
}

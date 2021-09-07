<?php 
session_start();
include('bdd.php');

	if (isset($_POST['email'])) {

		$password = uniqid(); //Génère un identifiant unique
		$hasedPassword = password_hash($password, PASSWORD_DEFAULT);

		$message = "Bonjour, voici votre nouveau Mot de Passe: $password";// Envoie du mdp en clair, pas hash
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>forgot Password</title>
</head>
<body>
	<h1>Mot de passe oublié</h1>
	<form action="" method="POST">
		<input type="email" name="email" placeholder="Entrez votre email*">
		<input type="submit" name="submit">
	</form>
</body>
</html>
<?php 
session_start();
include ('./bdd.php');

// 1- User Registration
	if (isset($_POST['submit'])) {
		if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['confirmMdp']) && !empty($_POST['pseudo'])) {

			$name = htmlspecialchars($_POST['name']);
			$surname = htmlspecialchars($_POST['surname']);
			$email = htmlspecialchars($_POST['email']);
			$mdp = htmlspecialchars($_POST['mdp']);
			$confirmMdp = htmlspecialchars($_POST['confirmMdp']);
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$role = 'userRole';

			$check = $bdd->prepare('SELECT nom, surName, email, mdp, pseudo, role FROM user WHERE email = ?');
			$check->execute(array($email));
			$data = $check->fetch();
			$row = $check->rowCount(); 
			
			if ($row === 0) { // Le user existe pas
				if (strlen($pseudo) <= 45) { // Vérification que la longueur du pseudo n'est pas supèrieur à 45 caractères
					if (strlen($email) <= 45) {
						if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
							if ($mdp === $confirmMdp) {
								$password = password_hash($mdp, PASSWORD_BCRYPT);
																
								$insert = $bdd->prepare("INSERT INTO user(nom, surName, email, mdp, pseudo, role) VALUES (:nom, :surName, :email, :mdp, :pseudo, :role)"); 							
								$verif = $insert->execute(array('nom'=>$name, 'surName'=>$surname, 'email'=>$email, 'mdp'=>$password, 'pseudo'=>$pseudo, 'role'=>$role)); 
									var_dump($name, $surname, $email, $password, $pseudo, $role);
								echo "Compte enregistré avec success";
							}
						}else echo "Format non valide";
					} else "Format trop long";
				} else "Format trop long";
			}else echo "Compte déja crée, veuillez vous connecter";
		}else echo "Veuillez compléter tous les champs*";
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" href="/css/style.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
</head>
<body>

	<header>
		<div class="connection">
			<div class="logo_fk">
				<img src="https://www.cpas.grez-doiceau.be/epn/images/logo-facebook.png/@@images/e089d70f-51fe-4bc3-9fb4-50af5d51ef69.png" alt="">
				<span>Fakebook</span>				
			</div>

	<!-- Formulaire de connexion -->

			<div class="login">
				<form action="login.php" method="POST">
					<input type="email" name="email" placeholder="email*">
					<input type="password" name="mdp" placeholder="password*">
					<input type="submit" name="connexion" placeholder="Connexion" id="connexion">		
				</form>

				<div class="forget_password">
					<a href="">Information de compte oublié ?</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Formulaire d'inscritpion -->

	<div class="main">
		<div class="register">
			<div class="connected_people">
				<p>Avec Fakebook, partagez et restez en contact avec votre entourage.</p>
				<img src="https://pngimage.net/wp-content/uploads/2018/05/connecting-people-png-8.png" alt="">
			</div>
		
			<div class="inscritpion">
				<h1>Inscription</h1>
				<p>C'est gratuit (et ça le restera toujours)</p>
				<form action="" method="POST">
					<input type="text" name="name" placeholder="prénom*" autocomplete="">
					<input type="text" name="surname" placeholder="Nom*" autocomplete="">
					<input type="email" name="email" placeholder="email*" autocomplete="">
					<input type="password" name="mdp" placeholder="Mot de passe*">
					<input type="password" name="confirmMdp" placeholder="Confirmation mot de passe*">
					<input type="text" name="pseudo" placeholder="pseudo*" autocomplete="">
					<input type="submit" name="submit" placeholder="Inscription" id="inscription">			
				</form>							
			</div>
		</div>
	</div>

</body>
</html>
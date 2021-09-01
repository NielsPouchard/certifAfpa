<?php 
session_start();
include ('./bdd.php');

// 1-Login
	if (isset($_POST['connexion'])) {
		$email = htmlspecialchars($_POST['email']);
		$mdp = htmlspecialchars($_POST['mdp']);

		if (!empty($_POST['email'])  && !empty($_POST['mdp'])) {

			$check = $bdd->prepare('SELECT * FROM user WHERE email = ?');
			$check->execute(array($email));
			$row = $check->rowCount(); // On va rechercher avec rowCount si le user existe dans la table

			if ($row == 1) { // Le user existe
				$data = $check->fetch(); // On stock les données dans $data
				
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$password = password_verify($mdp, $data['mdp']);

					if ($password) {
						$_SESSION['pseudo'] = $data['pseudo'];
						$_SESSION['mdp'] = $data['mdp'];
						$_SESSION['iduser'] = $data['iduser'];
						$_SESSION['photo'] = $data['photo'];

						if ($data['role'] == 'userAdmin') {
							header("Location: admin.php?id=".$_SESSION['pseudo']);
							
						}else header("Location: user.php?id=".$_SESSION['pseudo']);
					}											
				}else header('Location: index.php?lgin_err=email');				
			}else header('Location: index.php?login_err=already');			
		}else header('Location: index.php');		
	}

?>
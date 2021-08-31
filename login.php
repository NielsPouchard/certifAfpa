<?php 
session_start();
include ('./bdd.php');

// 3-Login
	if (isset($_POST['connexion'])) {
		if (!empty($_POST['email'])  && !empty($_POST['mdp'])) {

			$email = htmlspecialchars($_POST['email']);
			$mdp = htmlspecialchars($_POST['mdp']);

			$check = $bdd->prepare('SELECT email, mdp, pseudo, role FROM user WHERE email = ?');
			$check->execute(array($email));
			$data = $check->fetch(); // On stock les données dans $data
			$row = $check->rowCount(); // On va rechercher avec rowCount si le user existe dans la table

			if ($row == 1) { // Le user existe
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$password = password_verify($mdp, $data['mdp']);
					var_dump($password, $mdp, $data);
					$_SESSION['user'] = $_SESSION['pseudo'];					
						if ($data['role'] == 'userAdmin') {
							header('Location: admin.php');

						}else header('Location: user.php');					
				}else header('Location: index.php?lgin_err=email');				
			}else header('Location: index.php?login_err=already');			
		}else header('Location: index.php');		
	}

?>
<?php 
session_start();
include ('./bdd.php');

// 1-Login
	if (isset($_POST['connexion'])) {
		$email = htmlspecialchars($_POST['email']);
		$mdp = htmlspecialchars($_POST['mdp']);

		if (!empty($_POST['email'])  && !empty($_POST['mdp'])) {

			$data = $userModel->checkUsers($iduser);
			$row = $check->rowCount(); // On va rechercher avec rowCount si le user existe dans la table

			if ($row == 1) { // Le user existe
				$data = $check->fetch(); // On stock les données dans $data
			
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
							header("Location: views/view/admin.php?id=".$_SESSION['iduser']);
								
						}else header("Location: ./user.php?id=".$_SESSION['iduser']);
					}											
				}else header('Location: ./index.php');				
			}else header('Location: ./index.php');			
		}else header('Location: ./index.php');		
	}

?>
<?php  
session_start();
require_once('./controlers/bdd.php'); 
require_once('./controlers/models/User.php');

if (isset($_POST['update'])){
	if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['pseudo']) && isset($_POST['email'])) {

		$name = htmlspecialchars($_POST['name']);
		$surname = htmlspecialchars($_POST['surname']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$email = htmlspecialchars($_POST['email']);
		$iduser = $_SESSION['iduser'];

		$data = $userModel->checkUsers($iduser);
		$row = $check->rowCount();
		
		if ($row === 1) {
		
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				$userModel->updateUser(compact('name', 'surname', 'email', 'pseudo', 'iduser'));
					
					if ($user) {
						$_SESSION['pseudo'] = $pseudo;
					}
					
						echo "Modifications prises en compte";
						header('Location: updateProfileUser.php');
				
			}else echo"Format email non valide";
		}
	}
}
	
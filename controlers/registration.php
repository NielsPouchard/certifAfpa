<?php  

include('./bdd.php'); 

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
									
								echo "Compte enregistré avec success";
								header('./index.php');
							}
						}else echo "Format non valide";
					} else echo "Format trop long";
				} else echo "Format trop long";
			}else echo "Compte déja crée, veuillez vous connecter";
		}else echo "Veuillez compléter tous les champs*";
	}
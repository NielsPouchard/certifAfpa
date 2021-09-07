<?php 
session_start();
include('bdd.php');

if (isset($_POST['upload']) && isset($_FILES)) { 

	$target_file = './pictures/upload/' .basename($_FILES['photo']['name']);
	$typePicture = $_FILES['photo']['type'];	
	$photoExtension = substr($typePicture, 6);
	$sizePicture = $_FILES['photo']['size'];
	$picture = $_FILES['photo']['tmp_name'];	
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)) .$_SESSION['iduser']. ".";
	$uploaded = move_uploaded_file($picture, $target_file);
	$iduser = $_SESSION['iduser'];

		if ($target_file) {
			$taillemax = 2097152; // Correspond à 2Mo
			if ($taillemax > $sizePicture)  {		
				 $extensionValides = array('jpg', 'jpeg', 'gif', 'png'); 
				if (in_array($photoExtension,$extensionValides)) {

					$check = $bdd->prepare('SELECT photo FROM user WHERE iduser= ?');
					$check->execute(array($target_file));
					$data = $check->fetch();
					$row = $check->rowCount();
						
					if ($row === 1) {
						
						$existPicture = $bdd->prepare("DELETE photo FROM user WHERE iduser = ?");
						$existPicture->execute([$_SESSION['iduser']]);

						$updatePicture = $bdd->prepare("UPDATE user SET photo = :photo WHERE iduser = :iduser"); 	
						$updatePicture->execute([
							"photo"=>$target_file,
							"iduser" => $_SESSION['iduser']]);	
											
						$_SESSION['photo'] = $target_file;

						if ($target_file){ 
							
							header('Location: user.php');
						}else echo "Une erreur s'est produite";	

					}else {
						
						$updatePicture = $bdd->prepare("UPDATE user SET photo = :photo WHERE iduser = :iduser"); 	
						$updatePicture->execute(["photo"=>$target_file,"iduser" => $_SESSION['iduser']]);					
						$_SESSION['photo'] = $target_file;
					}

				}else echo "Format non valide, veuillez choisir: 'jpg', 'jpeg', 'gif', 'png' ";	
			}else echo "Fichier trop volumineux (max 2Mo)";						
		}header('Location: user.php');				
			
}


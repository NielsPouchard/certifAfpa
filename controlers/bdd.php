<?php 
session_start();
// 1-Connexion bdd

	function getBdd(): PDO{

		$bdd = new PDO('mysql:host=localhost;dbname=facebook;charset=utf8', 'root', '', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC	
		]);

		return $bdd;
	}

	function checkUsers(int $iduser): array{
		$bdd = getBdd();		
		$check = $bdd->prepare("SELECT * FROM user WHERE iduser = ?");
		$check->execute(array($iduser));			
		$data = $check->fetch();

		return $data;
	}

	
	function selectPicture($target_file): array{
		$bdd = getBdd();
		$check = $bdd->prepare('SELECT photo FROM user WHERE iduser= ?');
		$check->execute(array($target_file));
		$picture = $check->fetch();

		return $picture;
	}

	function deletePicture($_SESSION): void{
		$bdd = getBdd();
		$existPicture = $bdd->prepare("DELETE photo FROM user WHERE iduser = ?");
		$existPicture->execute([$_SESSION['iduser']]);
	}

	function insertUser(array $variables=[]){
		$bdd = getBdd();
		extract($variables);
		$insert = $bdd->prepare("INSERT INTO user(nom, surName, email, mdp, pseudo, role) VALUES (:nom, :surName, :email, :mdp, :pseudo, :role)"); 		
		$insert->execute(compact('name','surname','email','password','pseudo','role'));	
	}

	function updateUserPicture(array $variables=[]){
		
	}

















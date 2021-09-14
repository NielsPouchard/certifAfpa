<?php 

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

	
	function selectPicture(int $target_file): array{
		$bdd = getBdd();
		$check = $bdd->prepare('SELECT photo FROM user WHERE iduser= ?');
		$check->execute(array($target_file));
		$picture = $check->fetch();

		return $picture;
}
















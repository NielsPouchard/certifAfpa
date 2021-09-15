<?php
require_once('./controlers/bdd.php');

class Picture{ 

	public function selectPicture($target_file): array{
		$bdd = getBdd();
		$check = $bdd->prepare('SELECT photo FROM user WHERE iduser= ?');
		$check->execute(array($target_file));
		$picture = $check->fetch();

		return $picture;
	}

	public function deletePicture($iduser): void{
		$bdd = getBdd();
		$existPicture = $bdd->prepare("DELETE photo FROM user WHERE iduser = ?");
		$existPicture->execute([$iduser]);
	}

	public function updateUserPicture(array $variables=[]){
		$bdd = getBdd();
		extract($variables);
		$updatePicture = $bdd->prepare("UPDATE user SET photo = :photo WHERE iduser = :iduser"); 	
		$updatePicture->execute(compact('target_file', 'iduser'));
		/* 	"photo"=>$target_file,
			"iduser" => $_SESSION['iduser']]);	 */
	}


}

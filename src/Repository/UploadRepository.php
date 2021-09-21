<?php

namespace App\Repository;

use App\Model\RegistrationUser;

class UploadUserRepository extends AbstractRepository
{
	public function selectPicture($target_file): array
	{				
		$check = $this->getDb()->prepare('SELECT photo FROM user WHERE iduser= ?');
		$check->execute(array($target_file));
		return $check->fetchObject();
	}

	public function updateUserPicture(RegistrationUser $user)
	{			
		$updatePicture = $this->getDb()->prepare("UPDATE user SET photo = :photo WHERE iduser = :iduser"); 	
		$updatePicture->execute([
			"photo"=>$target_file,
			"iduser" => $_SESSION['iduser'] 
		]);
		return $updatePicture->fetchObject();
	}

	public function deleteUserPicture(RegistrationUser $user)
	{						
		$pictureModel->deletePicture($iduser);
		$pictureModel->updateUserPicture(compact('target_file', 'iduser'));
							
		$_SESSION['photo'] = $target_file;
	}
}

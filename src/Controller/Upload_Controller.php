<?php 
namespace app\Controller;

use App\Model\UserProfile;
use App\Repository\UploadRepository;
use App\Utils\RequestFormValidator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Upload_Controller	
{
	use RequestFormValidator;

	public function upload(Request $request): Response
	{
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

					$pictureRegistration = new RegistrationPicture($request);
					$SelectPicture = new UploadRepository();
					$pictureExist = $selectPicture->selectPicture($target_file);
					$row = $check->rowCoun();
						
					if ($row === 1) {						
						$pictureModel->deletePicture($iduser);
						$pictureModel->updateUserPicture(compact('target_file', 'iduser'));
											
						$_SESSION['photo'] = $target_file;

						if ($target_file){ 
							return new Response("Error");		
						}	

						}else {
						
						$updatePicture = $bdd->prepare("UPDATE user SET photo = :photo WHERE iduser = :iduser"); 	
						$updatePicture->execute(["photo"=>$target_file,"iduser" => $_SESSION['iduser']]);					
						$_SESSION['photo'] = $target_file;
						}
						return new RedirectResponse('/user');
					}
					return new RedirectResponse('/user');
				}	
				return new Response("Invalid format, please choose:'jpg', 'jpeg', 'gif', 'png'");
			};
			return new Response ("max 2mo");					
		}
		return render_template($request);
	}
}

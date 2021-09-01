<?php 
session_start();

if (isset($_POST['upload'])) {

	$target_file = './pictures/upload/' .basename($_FILES['photo']['name']);
	$picture = $_FILES['photo']['tmp_name'];
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$variable = move_uploaded_file($picture, $target_file);
	
	if ($variable) {

		$_SESSION['photo'] = $target_file;

		header('Location: user.php');
		
	}
}

?>
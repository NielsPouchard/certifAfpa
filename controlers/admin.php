<?php 
session_start();

	if (!$_SESSION['mdp']) {
		header('Location: index.php');
	}

	echo $_SESSION['pseudo'];
?>
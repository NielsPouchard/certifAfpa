<?php
session_start();

	if (!$_SESSION['mdp']) {
		header('Location: index.php');
	}

	echo $_SESSION['pseudo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
</head>
<body>
	<a href="logout.php"><button>Déconnexion</button></a>
</body>
</html>

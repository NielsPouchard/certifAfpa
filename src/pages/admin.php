<?php 
session_start();
require_once('../../controlers/bdd.php');
$bdd = getBdd();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
</head>
<body>
	<a href="logout.php"><button>Déconnexion</button></a>
</body>
</html>
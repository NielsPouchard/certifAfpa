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
	<title>forgot Password</title>
</head>
<body>
	<h1>Mot de passe oublié</h1>
	<form action="" method="POST">
		<input type="email" name="email" placeholder="Entrez votre email*">
		<input type="submit" name="submit">
	</form>
</body>
</html>
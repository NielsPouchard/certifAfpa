<?php 

// 1-Connexion bdd
try {
	$bdd = new PDO("mysql:host=localhost; dbname=facebook; charset=utf8", 'root', '');
} catch (Exception $e) {
	echo 'Erreur de connexion:' .$e->getMessage();
}
?>
<?php 

// 1-Connexion bdd

	function getBdd(): PDO{

		$bdd = new PDO('mysql:host=localhost;dbname=facebook;charset=utf8', 'root', '', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC	
		]);

		return $bdd;
	}
	















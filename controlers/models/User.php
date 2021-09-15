<?php
require_once __DIR__.'/../../controlers/bdd.php';

class User {
	
	public function checkUsers(string $email): ?array
	{
		$bdd = getBdd();		
		$check = $bdd->prepare("SELECT * FROM user WHERE email = ?");
		$check->execute(array($email));			
		$data = $check->fetch();
	
		return $data;
	}

	public function insertUser(array $variables=[])
	{
		$bdd = getBdd();
		extract($variables);
		$insert = $bdd->prepare("INSERT INTO user(nom, surName, email, mdp, pseudo, role) VALUES (:nom, :surName, :email, :mdp, :pseudo, :role)"); 		
		$insert->execute(compact('name','surname','email','password','pseudo','role'));	
	}


	public function updateUser(array $variables=[])
	{
		$bdd = getBdd();
		extract($variables);
		$updateDataUser = $bdd->prepare("UPDATE user SET nom = :name, surName = :surname, email = :email, pseudo = :pseudo WHERE iduser = :iduser"); 	
		$user = $updateDataUser->execute(compact('name', 'surname', 'email', 'pseudo', 'iduser'));	
	}










}

<?php 
session_start();
include('bdd.php');


// 1- Analyser la demande faite via l'url (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 $task = "list";

if (array_key_exists("task", $_GET)) {
	 $task = $_GET['task'];
}

if ($task == "write") {
	postMessage();
}else {
	getMessages();
}

// 1-Créer une function qui va récupérer les messages dans la bdd + GET
	function getMessages(){
		global $bdd; // Récupère la bdd qui es en dehors de la function
// 2-On crée une function (requête bdd) pour afficher les 20 derniers messages
		$result = $bdd->query('SELECT * FROM chat ORDER BY created_at DESC LIMIT 5');
// 3-On traite les résultas
		$messages = $result->fetchAll();
// 4-On affiche les données sous forme de JSON
		echo json_encode($messages); // Retourne la représentation JSON d'une valeur($messages);
	}

// 1- Créer une function pour envoyer les messages en POST
	function postMessage(){
		global $bdd;

// 2- Traiter les paramètres passés en POST	(pseudo + content)
		if(!array_key_exists('pseudo', $_POST) || !array_key_exists('content', $_POST)) {
			echo json_encode(["status" => "error", "message" => "Message non envoye"]);
			return; // Pour arrêter la function
		}
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$content = htmlspecialchars($_POST['content']);


// 3-Créer une requête pour insérer dans la bdd
		$query = $bdd->prepare("INSERT INTO chat(created_at, pseudo, content, user_iduser) VALUES (:created_at, :pseudo, :content, :user_iduser)");
		$date = new \DateTime();		
		$created_at = (array)$date;	
		$statement = $query->execute([			
			"pseudo" => $pseudo,
			"content" => $content,
			"created_at" => $created_at['date'],
			"user_iduser" => $_SESSION['iduser'] 
		]);
		
// 4-Donner un statut du succes ou d'erreur au format JSON
		echo json_encode(["status" => "success"]);
	}


















?>
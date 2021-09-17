<?php
use App\Database\DB;

$bdd = DB::getDb();

// 1- Analyser la demande faite via l'url (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
$task = "list";

if (array_key_exists("task", $_GET)) {
    $task = $_GET['task'];
}

if ($task === "write") {
    postMessage();
}else {
    getMessages();
}

// 1-Créer une function qui va récupérer les messages dans la bdd + GET
function getMessages()
{
    global $bdd; // Récupère la bdd qui es en dehors de la function
// 2-On crée une function (requête bdd) pour afficher les 20 derniers messages
    $result = $bdd->query('SELECT * FROM chat ORDER BY created_at DESC LIMIT 20');
// 3-On traite les résultas
    $messages = $result->fetchAll();
// 4-On affiche les données sous forme de JSON
    return json_encode($messages); // Retourne la représentation JSON d'une valeur($messages);
}

// 1- Créer une function pour envoyer les messages en POST
function postMessage(Request $request)
{
    $bdd = DB::getDb();

// 2- Traiter les paramètres passés en POST	(pseudo + content)
    if(!array_key_exists('pseudo', $request->request->all()) || !array_key_exists('content', $request->request->all())) {
        return new JsonResponse(["status" => "error", "message" => "Message non envoye"], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    $pseudo = htmlspecialchars($request->request->get('pseudo'));
    $content = htmlspecialchars($request->request->get('content'));
// 3-Créer une requête pour insérer dans la bdd
    $query = $bdd->prepare("INSERT INTO chat(created_at, pseudo, content, user_iduser) VALUES (:created_at, :pseudo, :content, :user_iduser)");
    $date = new \DateTime();

    $query->execute([
        "pseudo" => $pseudo,
        "content" => $content,
        "created_at" => $date->format('Y-m-d H:i:s'),
        "user_iduser" => $_SESSION['user']->id
    ]);

// 4-Donner un statut du succes ou d'erreur au format JSON
    return new JsonResponse([$query->fetchObject()], Response::HTTP_OK);
//        return json_encode(["status" => "success"]);
}

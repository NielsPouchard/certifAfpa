<?php
session_start();
use App\Database\DB;

$bdd = DB::getDb();


// 1-Créer une function qui va récupérer les messages dans la bdd + GET
function getPosted(){
    global $bdd; // Récupère la bdd qui es en dehors de la function
// 2-On crée une function (requête bdd) pour afficher les 20 derniers messages
    $result = $bdd->query('SELECT * FROM post ORDER BY created_at DESC LIMIT 20');
// 3-On traite les résultas
    $posted = $result->fetchAll();
// 4-On affiche les données sous forme de JSON
    echo json_encode($posted); // Retourne la représentation JSON d'une valeur($messages);
}

<?php
use App\Database\DB;

$bdd = DB::getDb();
//$searchBar = $bdd->query('SELECT * FROM user ORDER BY iduser DESC LIMIT 5');

if (isset($_GET['searchBar']) && !empty($_GET['searchBar'])) {

    $search =  htmlspecialchars($_GET['searchBar']);

    $searchBar = $bdd->query('SELECT * FROM user WHERE email LIKE "%'.$search.'%" ORDER BY iduser');

    if ($searchBar->rowCount() === 0) {
        $searchBar = $bdd->query('SELECT * FROM user WHERE CONCAT(nom, surName, pseudo) LIKE "%'.$search.'%" ORDER BY iduser DESC');
    }
}

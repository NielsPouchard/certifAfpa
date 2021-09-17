<?php
namespace App\Database;
/*
 * You can watch App\Database\DB class file to understand how we gonna load the db
 * in the future
 */
function getBdd(): \PDO{

    $bdd = new \PDO('mysql:host=localhost;dbname=facebook;charset=utf8', 'admin', 'adminPassword', [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);

    return $bdd;
}
